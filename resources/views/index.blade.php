
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroMarkt</title>

    @include('components.libraries')
  
</head>

<body>
    @include('components.navbar')

     @include('components.modals')

    <div class="container-fluid">
      <div class="row">
      <div class="col-12 col-lg-7 py-4  text-center">

        <p class="py-3 pl-5 text-center product-title text-danger font-weight-bold empty">{{$title}}</p>
    

        <a href="/products/desc" class="text-danger asc mr-3" data-toggle="tooltip" data-placement="top" title="Decroissant"><i class="fas fa-sort-amount-up-alt"></i></a>
        <a href="/products/asc" class="text-danger desc"><i class="fas fa-sort-amount-down" data-toggle="tooltip" data-placement="top" title="Croissant"></i></a>
      

      </div>
      </div>
        <div class="row ml-2">
            <div class="col-12 col-lg-3">
                <div class="list-group w-100 category_container">

                    <a class="list-group-item list-group-item-action bg-danger text-white" id="list-home-list" href="#list-home"
                        role="tab" aria-controls="home"><i class="fas fa-bars pr-3"></i>Category</a>


                        @foreach ($categories as $category)

                        <a class="list-group-item list-group-item-action text-danger" id="list-home-list" href="/category_products/{{$category->id_category}}"
                        role="tab">{{$category->libelle}}<span class="badge badge-danger badge-pill ml-2 num_produit">{{$category->num_produit}}</span><input class="id_category" value={{$category->id_category}} hidden ></a>

                        @endforeach 
                 
                </div>
            </div>


        <div class="col-12 col-lg-9">
            <div class="container">
                <div class="row produit_container">

                @foreach ($products as $product )

                <div class="col-sm-4 col-lg-3 mb-4 col-produit">
                  
        <div class="card border_thick">
            <img class="card-img-top produit_image"
                src={{$product->image}}
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title title_produit">{{$product->libelle}}</h5>
                <input type="text" class="title_produit" id="title_produit_{{$product->id_product}}" value={{$product->libelle}} hidden >
                <input type="text" class="id_produit" name="id_product" id="id_produit_{{$product->id_product}}" value="{{$product->id_product}}" hidden >
            </div>
          <div class="card-footer d-flex justify-content-between card_details">
                <p value="">{{$product->prix}}</p>
                <input type="text" class="prix_produit" id="prix_produit_{{$product->id_product}}" value="{{$product->prix}}" hidden>
                <ul class="pagination pagination-sm d-flex justify-content-center"> 
                <li class="page-item position-absolute mr-3 check_produit"><a class="page-link"><i class="fas fa-check text-danger"></i></a></li> 
                <li class="page-item position-absolute mr-3 add_produit" onclick="selectProduit(this,{{$product->id_product}})"><a class="page-link" href="/card/add/{{$product->id_product}}"><i class="fas fa-plus text-danger"></i></a></li>                                                         
                </ul>
    
          </div>
        </div>
       
    </div>
                    
                @endforeach
             
                </div>

            </div>
        </div>
        </div>
    </div>
{{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $products->links() !!}
        </div>

    {{-- <div class="container">
      <div class="row">
        <div class="col-12 col-lg-9 d-flex align-items-center justify-content-center mt-3">
          <nav aria-label="...">
            <ul class="pagination pagination-sm page_pagination ">
            </ul>
          </nav>
        </div>
      </div>
    </div> --}}



    <footer class="mt-5">
        <div class="card mt-5">
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p class="font-weight-light text-secondary text-center display-5">© 2021,ElectroMarket</p>
              </blockquote>
            </div>
          </div>
    </footer>

                      


</body>

</html>