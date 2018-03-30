    
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="{{ isActiveURL('/manager') }}">
                      <a class="" href="{{ url('/manager') }}">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <?php //dd(route('mpages')); ?>

                  <li class="{{ isActiveURL(route('msliders')) }}">
                      <a href="{{ route('msliders') }}" class="">
                          <i class="fa fa-film"></i>
                          <span>Sliders</span>
                      </a>
                  </li>

                  <li class="{{ isActiveURL(route('mpages')) }}">
                      <a href="{{ route('mpages') }}" class="">
                          <i class="fa fa-file-text-o"></i>
                          <span>Pages</span>
                      </a>
                  </li>

                  <li class="{{ isActiveURL(route('mservices')) }}">
                      <a href="{{ route('mservices') }}" class="">
                          <i class="fa fa-coffee"></i>
                          <span>Services</span>
                      </a>
                  </li>

                  <li class="{{ isActiveURL(route('mprices')) }}">
                      <a href="{{ route('mprices') }}" class="">
                          <i class="fa fa-money"></i>
                          <span>Menu</span>
                      </a>
                  </li>

                  <li class="{{ isActiveURL(route('mportfolios')) }}">
                      <a href="{{ route('mportfolios') }}" class="">
                          <i class="fa fa-picture-o"></i>
                          <span>Gallery</span>
                      </a>
                  </li>

                  <li class="{{ isActiveURL(route('mstats')) }}">
                      <a href="{{ route('mstats') }}" class="">
                          <i class="fa fa-line-chart"></i>
                          <span>Stats</span>
                      </a>
                  </li>

                  <li class="{{ isActiveURL(route('mpeoples')) }}">
                      <a href="{{ route('mpeoples') }}" class="">
                          <i class="fa fa-thumbs-o-up"></i>
                          <span>Chefs</span>
                      </a>
                  </li>

                  <li class="{{ isActiveURL(route('mclients')) }}">
                      <a href="{{ route('mclients') }}" class="">
                          <i class="fa fa-envelope-o"></i>
                          <span>Feedback</span>
                      </a>
                  </li>

				          <!-- <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="form_component.html">Form Elements</a></li>                          
                          <li><a class="" href="form_validation.html">Form Validation</a></li>
                      </ul>
                  </li> --> 

                 <!--  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>UI Fitures</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">Elements</a></li>
                          <li><a class="" href="buttons.html">Buttons</a></li>
                          <li><a class="" href="grids.html">Grids</a></li>
                      </ul>
                  </li> -->

                  <!-- <li>
                      <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Widgets</span>
                      </a>
                  </li> -->


                  <!-- <li>
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>
                      </a>
                  </li> -->
                             
                  <!-- <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">Basic Table</a></li>
                      </ul>
                  </li> -->
                  
                  
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
     