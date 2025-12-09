<x-app-layout>
<div>
    <hr class="border-2 border-black">
    <h1 class="text-5xl my-1">Create New Product</h1>
    <hr class="border-2 border-black">
    <div class="border-2 border-black mt-4 mb-5 rounded-md">
    
        <form action="products" method="post" class="flex flex-col mb-2 mt-4 ms-3">
            @csrf
            <div class="mb-2">
                <label for="calories">Calories:</label>
                <input type="text" name="calories" id="calories" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label for="total_fat">Total Fat:</label>
                <input type="text" name="total_fat" id="total_fat" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label for="satured_fat">Satured Fat:</label>
                <input type="text" name="satured_fat" id="satured_fat" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label for="trans_fat">Trans Fat:</label>
                <input type="text" name="trans_fat" id="trans_fat" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label for="cholesterol_fat">Cholestero Fat:</label>
                <input type="text" name="cholesterol_fat" id="cholesterol_fat" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label for="polyunsaturated_fat">Polyunsaturated Fat:</label>
                <input type="text" name="polyunsaturated_fat" id="polyunsaturated_fat" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label for="carbohydrates">Carbohydrates:</label>
                <input type="text" name="carbohydrates" id="carbohydrates" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label for="monounsaturated_fat">Monounsaturated Fat:</label>
                <input type="text" name="monounsaturated_fat" id="monounsaturated_fat" class="rounded-md w-16">
            </div>
            
            <div class="mb-2">
                <label for="fiber">Fiber:</label>
                <input type="text" name="fiber" id="fiber" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label for="proteins">Proteins:</label>
                <input type="text" name="proteins" id="proteins" class="rounded-lg w-16">
            </div>

            <div class="mb-2">
                <label for="unit_measurement">Unit Measurement:</label>
                <div></div>
                <select type="text" name="unit_measurement" id="unit_measurement" class="rounded-md w-md">
                   @foreach()
                    <option value="">Category Test</option>
                   @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="product_category">Product Category:</label>
                <input type="text" name="product_category" id="product_category" class="rounded-md w-16">
            </div>
            
            <button type="submit" class="text-white rounded-md border-2 bg-blue-500 w-32 m-auto">Create Product</button>
        </form>
    </div>

    <div>
        <p class="text-lg text-center mt-1 mb-5">{{$message}}</p>
    </div>

    <hr class="border-2 border-black">
    <h1 class="text-5xl  my-1">List of Products Avaliable</h1>
    <hr class="border-2 border-black">

     @foreach($products as $product)
        <div class="border-2 border-black rounded-md my-2">
            <p> Id: {{ $product->id }} </p>
            <p> Calories: {{ $product->calories }} </p>
            <p> Total Fat: {{ $product->total_fat }} </p>
            <p> Satured Fat: {{ $product->satured_fat }} </p>
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
                <button class="text-white border-2 rounded-md bg-red-500 p-2 m-3">Delete</button>
                <button class="border-2 border-red-500 rounded-md bg-white p-2 m-3">Edit</button>
            @endif
        </div>
     @endforeach
</div>
</x-app-layout>