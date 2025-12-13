<x-app-layout>
<div>
    <hr class="border-2 border-black">
    <h1 class="my-1 text-5xl">Create New Product</h1>
    <hr class="border-2 border-black">
    <div class="mt-4 mb-5 border-2 border-black rounded-md">
        <form action="products" method="post" class="flex flex-col ms-3 mt-4 mb-2">
            @csrf
            <div class="mb-2">
                <label for="name">Name:</label>
                <input type="string" placeholder="Product name" required name="name" id="name" class="px-2 rounded-md w-32">
                @if($errors->has('name'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('name') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="calories">Calories:</label>
                <input required type="number" value="1" min="1" name="calories" id="calories" class="rounded-md w-16">
                @if($errors->has('calories'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('calories') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="total_fat">Total Fat:</label>
                <input required type="number" value="0" min="0" name="total_fat" id="total_fat" class="rounded-md w-16">
                @if($errors->has('total_fat'))
                    <div>
                       <p class="text-red-500"> {{ $errors->first('total_fat') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="saturated_fat">Saturated Fat:</label>
                <input required type="number" value="0" min="0" name="saturated_fat" id="saturated_fat" class="rounded-md w-16">
                @if($errors->has('saturated_fat'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('saturated_fat') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="trans_fat">Trans Fat:</label>
                <input required type="number" value="0" min="0" name="trans_fat" id="trans_fat" class="rounded-md w-16">
                @if($errors->has('trans_fat'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('trans_fat') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="cholesterol_fat">Cholestero Fat:</label>
                <input required type="number" value="0" min="0" name="cholesterol_fat" id="cholesterol_fat" class="rounded-md w-16">
                @if($errors->has('cholesterol_fat'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('cholesterol_fat') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="polyunsaturated_fat">Polyunsaturated Fat:</label>
                <input required type="number" value="0" min="0" name="polyunsaturated_fat" id="polyunsaturated_fat" class="rounded-md w-16">
                @if($errors->has('polyunsaturated_fat'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('polyunsaturated_fat') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="carbohydrates">Carbohydrates:</label>
                <input required type="number" value="0" min="0" name="carbohydrates" id="carbohydrates" class="rounded-md w-16">
                @if($errors->has('carbohydrates'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('carbohydrates') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="monounsaturated_fat">Monounsaturated Fat:</label>
                <input required type="number" value="0" min="0" name="monounsaturated_fat" id="monounsaturated_fat" class="rounded-md w-16">
                @if($errors->has('monounsaturated_fat'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('monounsaturated_fat') }}</p>
                    </div>
                @endif
            </div>
            
            <div class="mb-2">
                <label for="fiber">Fiber:</label>
                <input required type="number" value="0" min="0" name="fiber" id="fiber" class="rounded-md w-16">
                @if($errors->has('fiber'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('fiber') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="proteins">Proteins:</label>
                <input required type="number" value="0" min="0" name="proteins" id="proteins" class="rounded-lg w-16">
                @if($errors->has('proteins'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('proteins') }}</p>
                @endif
            </div>

            <div class="mb-2">
                <label for="unit_measurement">Unit Measurement:</label>
                <div></div>
                <select required type="text" name="unit_measurement" id="unit_measurement" class="rounded-md w-lg">
                    <option value="grams">Grams</option>
                    <option value="kilograms">Kilograms</option>
                    <option value="miligrams">Miligrams</option>
                    <option value="units">Units</option>
                </select>
                @if($errors->has('unit_measurement'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('unit_measurement') }}</p>
                    </div>
                @endif
            </div>

            <div class="mb-2">
                <label for="product_category_id">Product Category:</label>
                <select required type="number" name="product_category_id" id="product_category_id" class="rounded-md w-lg">
                   @foreach($product_category as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                   @endforeach
                </select>
                @if($errors->has('product_category_id'))
                    <div>
                        <p class="text-red-500">{{ $errors->first('product_category_id') }}</p>
                    </div>
                @endif
            </div>
            <button type="submit" class="bg-blue-500 m-auto border-2 rounded-md w-32 text-white">Create Product</button>
        </form>
    </div>

    <div>
        <p class="mt-1 mb-5 text-green-500 text-lg text-center">{{$message}}</p>
    </div>

    <hr class="border-2 border-black">
    <h1 class="my-1 text-5xl">List of Products Avaliable</h1>
    <hr class="border-2 border-black">

     @foreach($products as $product)
        <div class="my-2 border-2 border-black rounded-md">
            <p> Id: {{ $product->id }} </p>
            <p> Calories: {{ $product->calories }} </p>
            <p> Total Fat: {{ $product->total_fat }} </p>
            <p> Saturated Fat: {{ $product->saturated_fat }} </p>
            <p> Trans Fat: {{ $product->trans_fat }} </p>
            <p> Cholestero Fat: {{ $product->cholesterol_fat }} </p>
            <p> Polyunsaturated Fat: {{ $product->polyunsaturated_fat }} </p>
            <p> Carbohydrates: {{ $product->carbohydrates }} </p>
            <p> Monounsaturated Fat: {{ $product->monounsaturated_fat }} </p>
            <p> Fiber: {{ $product->fiber }} </p>
            <p> Proteins: {{ $product->proteins }} </p>
            <p> Unit Measurement: {{ $product->unit_measurement }} </p>
            <p> Product Category: {{ $product_category[$product->product_category_id-1]->category}} </p>
            
            @if($product->user_id != 0)
                <p> User Id: {{ $product->user_id }} </p>
                <button class="bg-red-500 m-3 p-2 border-2 rounded-md text-white">Delete</button>
                <button class="bg-white m-3 p-2 border-2 border-red-500 rounded-md">Edit</button>
            @endif
        </div>
     @endforeach
</div>
</x-app-layout>