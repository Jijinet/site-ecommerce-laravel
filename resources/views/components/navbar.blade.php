
    <!-- NAVBAR  -->
    <div class="container-fluid">

        <div class="row d-flex align-items-center justify-content-between border-bottom">


            <div class="col-12 col-lg-2">
                <a class="navbar-brand" rel="icon" href="/">
                    <img src="{{asset('images/logo.png')}}"  class="ml-4" alt=""></a>
            </div>
            <div class="col-12 col-lg-6 align-self-center search-box">
                                <form method="GET" action="/products/search" class="input-group">
									<input type="text" placeholder="search" name="query" class="form-control w-75 search-item" aria-label="search" aria-describedby="button-addon2">
									<div class="input-group-btn"><button type="submit" class="btn btn-danger text-uppercase font-weight-normal btn_search">search</button></div>
								</form>
            </div>
            <div class="col-12 col-lg-3 d-flex">

            <div class="dropdown show">
              <div class="user_div">
             
              <a class="dropdown-toggle account ml-n4 display-5 username" href="#"  role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ session()->get('client') != null ? session()->get('client')->get(0)->nom : 'Account'}} 
                </a>
     

                <div class="dropdown-menu account_menu" aria-labelledby="dropdownMenuLink">
                @if(session()->get('client') == null)
                    <a class="dropdown-item drop_login" data-toggle="modal" data-target="#loginModal" >Login</a>                    
                    <a class="dropdown-item drop_register" data-toggle="modal" data-target="#registerModal" >Register</a>
                @else   
                    <a class="dropdown-item drop_register" href="/client/logout">Logout</a>
                @endif
                </div>
            </div>
          </div>
                <!-- Button trigger cart modal -->
                <a href="#" data-toggle="modal" class="basket" data-target=".bd-example-modal-lg">
                    <i class="fas fa-shopping-basket text-dark ml-4"></i>                   
                    <span class="badge badge-danger badge-pill ml-2 num_produit">{{session()->get('count') != null ? session()->get('count') : 0 }}</span>
                </a>
            </div>


        </div>

            
  

       