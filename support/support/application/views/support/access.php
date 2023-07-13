<!-- ============================================================== -->
<!-- Page wrapper  -->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-4 align-self-center">
                <h4 class="text-themecolor">User Permissions</h4>
            </div>
            <div class="col-md-8 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                        <li class="breadcrumb-item "><a href="<?php echo base_url()?>roles">Access Control</a></li>
                        <li class="breadcrumb-item active">User Permissions</li>
                    </ol>
                   
                </div>
            </div>
        </div>




        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

     

        
            
        <div class="row ">
     

            <!-- <div class="col-md-12 grid-container "> -->
         
           
            <div class="col-md-12  ">
                <!-- table responsive -->
                <!-- <div class="card grid-item" > -->
                <div class="card  " >
                    <div class="card-body">
                        
                   
                    <div class="table-responsive ">
                         <!--<b style="font-weight: bold; font-size:18px">Access Authentication</b>-->
                           	<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                            <thead>
                            </thead>
                            <tbody>

                           	<?php $i=1; if($routes->num_rows()>0){
                                                     foreach($routes->result() as $row){
													?>
                            <tr>
                            <th ><?php echo $row->route_name;?></th>
                            <th ><div ><input type="checkbox"  id="5<?php echo ++$i;?>" <?php { echo $row->status ==1 ? 'checked':''; }?> value="<?php echo $row->aid;?>"  onChange="handleChangeView(this,'<?php echo $row->rid?>','<?php echo $this->uri->segment(2)?>')" >
                            </div></th>
                            </tr>
                            <?php $i++;}}?>	
                            <!--<tr>-->
                            <!--<th ><?php echo 'Access Permission';?></th>-->
                            <!--<th ><div ><input type="checkbox"  id="" value=""  onChange="handleChangeView()" >-->
                            <!--</div></th>-->
                            <!--</tr>-->
                            </tbody>
                            </table>
                    </div>
                    </div>
                     </div>
        
                    </div>
                </div>
            </div>
       
      
        </div>
     
    </div>
    <!-- CONTAINER FLUID END -->
</div>
<!-- PAGE WRAPPER END -->





<script>
function handleChangeStatus(thiss,route,role){
   
    if(thiss.checked){
        alert(thiss)
      // updatePermissionStatus(route,role,action,1);
    }else{
        alert(route)
        //updatePermissionStatus(route,role,action,0);
    }
}
</script>


<script>
function handleChangeAdd(thiss,route,action,role){

    if(thiss.checked){
       updatePermissionStatus(route,role,action,1);
    }else{
        updatePermissionStatus(route,role,action,0);
    }
}
</script>




<script>
function handleChangeDelete(thiss,route,action,role){
    
 
    if(thiss.checked){
       updatePermissionStatus(route,role,action,1);
    }else{
        updatePermissionStatus(route,role,action,0);
    }
}
</script>

<script>
function handleChangeEdit(thiss,route,action,role){

    if(thiss.checked){
       updatePermissionStatus(route,role,action,1);
    }else{
        updatePermissionStatus(route,role,action,0);
    }
}
</script>

<script>
function handleChangeView(thiss,route,user){
    //alert(thiss);
     if(thiss.checked){
        // alert('bhsdbsgh');
       updatePermissionStatus(route,user,1);
     }else{
         //alert('m,m,d,m');
         updatePermissionStatus(route,user,0);
     }
}
</script>


<script>

function updatePermissionStatus(route,user,value){
           // alert('m,m,d,m');
            $.ajax({
                
                    url : "<?php echo site_url('Support_controller/changeUserPermissionStatus');?>",
                    method : "POST",
                    data : {route: route,role: user,value: value},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                       console.log(data);

                       $.toast({
                    heading: 'Success'
                    , text: 'User permission updated successfully.'
                    , position: 'top-right'
                    , loaderBg: '#ff6849'
                    , icon: 'success'
                    , hideAfter: 3500
                    , stack: 6
                    });

 
                    },
                    error: function(data) {
                        console.log(data);

                        $.toast({
                        heading: 'Failure'
                        , text: ' Failed to update user permission.'
                        , position: 'top-right'
                        , loaderBg: '#ff6849'
                        , icon: 'error'
                        , hideAfter: 3500
                        , stack: 6
                    });
          
                },
                });
                return false;
            }

</script>





   