<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    public $productId;
    public $view = 'list';
    
    // Form fields
    public $name, $price, $gender, $description;
    public $category, $brand, $tag = 'None';
    public $discount_price, $discount_percent;
    public $stock, $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'gender' => 'required',
        'category' => 'required',
        'stock' => 'required|integer',
        'image' => 'required|image|max:2048',
    ];

    // SAVE NEW PRODUCT
    public function save()
    {
        $this->validate();

        $imagePath = $this->image->store('products', 'public');

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'gender' => $this->gender,
            'description' => $this->description,
            'category' => $this->category,
            'brand' => $this->brand,
            'tag' => $this->tag,
            'discount_price' => $this->discount_price,
            'discount_percent' => $this->discount_percent,
            'stock' => $this->stock,
            'image' => $imagePath,
        ]);

        session()->flash('message', 'Product saved successfully.');

        $this->resetForm();
        $this->showList(); 
    }

    // SHOW EDIT FORM
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->gender = $product->gender;
        $this->description = $product->description;
        $this->category = $product->category;
        $this->brand = $product->brand;
        $this->tag = $product->tag;
        $this->discount_price = $product->discount_price;
        $this->discount_percent = $product->discount_percent;
        $this->stock = $product->stock;

        $this->view = 'edit';
    }

    // UPDATE PRODUCT
    public function update()
    {
        $product = Product::findOrFail($this->productId);

        $product->update([
            'name' => $this->name,
            'price' => $this->price,
            'gender' => $this->gender,
            'description' => $this->description,
            'category' => $this->category,
            'brand' => $this->brand,
            'tag' => $this->tag,
            'discount_price' => $this->discount_price,
            'discount_percent' => $this->discount_percent,
            'stock' => $this->stock,
        ]);

        $this->resetForm();
        $this->view = 'list';
        session()->flash('message', 'Product updated successfully.');
    }

    // DELETE PRODUCT
    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('message', 'Product deleted successfully.');
    }

    // SWITCH TO CREATE FORM
    public function showCreateForm()
    {
        $this->resetForm();
        $this->view = 'create';
    }

    // SWITCH TO LIST
    public function showList()
    {
        $this->view = 'list';
    }

    // RESET FORM FIELDS
    private function resetForm()
    {
        $this->reset([
            'name','price','gender','description','category',
            'brand','tag','discount_price','discount_percent',
            'stock','image'
        ]);
    }

    // RENDER VIEW
    public function render()
    {
        return view('livewire.products', [
            'products' => Product::all()
        ]);
    }
}
