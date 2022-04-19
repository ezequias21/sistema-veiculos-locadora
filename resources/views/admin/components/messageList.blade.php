   <div class="alert alert-danger alert-dismissible " role="alert">
       <i class="fa fa-exclamation-triangle mr-2"></i><span class="font-weight-bold"
           style="font-size: 16px;">Error(s)</span>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
               aria-hidden="true">×</span>
       </button>
       <hr>
       <div>

           <ul class="ml-4 mt-2" style="margin: 0; padding: 0">
             {{ $slot }}
           </ul>
       </div>
   </div>
