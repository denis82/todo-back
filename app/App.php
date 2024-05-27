<?php

namespace App;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Layers\Presentation\View\Todo\CityView;
use App\Layers\UseCase\Todo\GetAllCitiesUseCase;

class App
{
    private CityView $_cityView;
    private GetAllCitiesUseCase $_getAllCitiesUseCase;
    private string $_redirect = '';
    private ?int $_cityId;
    private array $_sessionCities = [];

    private string $_RequestUri = '/';

    public bool $_cleraCache = false;

    private ?string $_prefixWeb;
    public function __construct(
        CityView $cityView,
        GetAllCitiesUseCase $getAllCitiesUseCase)
    {

        $this->_cityView = $cityView;
        $this->_getAllCitiesUseCase = $getAllCitiesUseCase;
    }

    public function run()
    {
        // Обновиляем сессию
        $this->_refreshSessionCitiesIfEmpty();
        // Получаем символьный код из текущенго роута
        $this->_getSlugFromUri();

        $this->_setCityId();
        // Получаем символьный код из куки
        if(!$this->_prefixWeb){
            $this->_getSlugFromCookie();
        }
        $this->_saveRedirectPath();
    }
    public function setRedirect(?string $redirect)
    {
        if($redirect){
            $this->_redirect = $redirect;
        }
    }
    public function getRedirect(): string
    {
        return $this->_redirect;
    }
    public function getPrefixWeb(): ?string
    {
        return $this->_prefixWeb;
    }
    private function _setCityId(): void
    {
        $this->_cityId = collect($this->_sessionCities)->flip()->get($this->_prefixWeb);
    }
    public function getCityId(): ?int
    {
        return $this->_cityId;
    }

    private function _refreshSessionCitiesIfEmpty(): void
	{
        if(session()->get('cities')){
            return;
        }
        $mapped = Arr::mapWithKeys($this->_cityView->toArray(
            $this->_getAllCitiesUseCase->getAll()
        ), function (array $item, int $key) {
            return [$item['id'] => $item['slug']];
        });
        session()->put('cities',$mapped);
        $this->_sessionCities = session()->get('cities');
	}

    private function _getSlugFromUri(): void
    {

        $this->_prefixWeb = Str::of(\Request::getRequestUri())
                            ->explode('/')
                            ->filter(fn(string $value) => $value !== '')
                            ->first();
    }

    private function _getSlugFromCookie(): void
    {

        $this->_prefixWeb = collect($this->_sessionCities)->get(request()->cookie('CITY_ID'));
    }

    private function _saveRedirectPath(): void
    {
        if($this->_prefixWeb){
            $redirectPath = $this->_getRedirectPath();
            $this->setRedirect($redirectPath);
            if($redirectPath){
                $this->_prefixWeb = null;
            }
        }

    }

    private function _getRedirectPath(): ?string
    {
        $currentPath = \Request::getRequestUri();
        preg_match('/^\/' . $this->_prefixWeb . '/', $currentPath, $matches);
        $redirectPath = null;
        if(0 == count($matches)){
            $redirectPath = '/' . $this->_prefixWeb . $currentPath;
        }
        return $redirectPath;
    }
}
