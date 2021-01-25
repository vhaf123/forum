<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Voucher;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Customer;
use Livewire\WithPagination;

class HomeComponent extends Component
{

    use WithPagination;

    public $search, $categories, $brands, $brand_id, $category_id;

    public $favorites;

    protected $queryString = [  'search'        => ['except' => ''],
                                'brand_id'      => ['except' => ''], 
                                'category_id'   => ['except' => '']
                            ];

    public function mount(){
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    public function render()
    {


        if ($this->brand_id) {
            
            $vouchers = Voucher::where('title', 'LIKE', '%' . $this->search . '%')
                                ->where('brand_id',$this->brand_id)
                                ->paginate(6);

        } elseif ($this->category_id){

            $vouchers = Category::find($this->category_id)->vouchers()->paginate(6);

        }elseif($this->favorites){

            $vouchers = Customer::find(session('customer')->id)->vouchers()->paginate(6);

        }else{

            $vouchers = Voucher::where('title', 'LIKE', '%' . $this->search . '%')
                        ->paginate(6);

        }

        return view('livewire.home-component', compact('vouchers'));
    }

    public function favorites(Voucher $voucher){
        if ($voucher->check) {
            $voucher->customers()->detach(session('customer')->id);
        }else{
            $voucher->customers()->attach(session('customer')->id);
        }
    }



    //Updating
    public function updatingSearch()
    {
        $this->resetPage();

        $this->reset(['brand_id', 'category_id', 'favorites']);
    }

    public function updatingBrandId()
    {
        $this->resetPage();
        $this->reset(['search', 'category_id', 'favorites']);
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
        $this->reset(['search', 'brand_id', 'favorites']);
    }

    public function updatingFavorites()
    {
        $this->resetPage();
        $this->reset(['search', 'brand_id', 'category_id']);
    }

}
