$(function(){
    "use strict";
    $(document).on('click','.delete-confirm',function(){
       let url = $(this).data('route');
       console.log(url);
       let csrf = $(this).data('csrf');
       console.log(url);
       Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete Data",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url:url,
                data: {
                    _token : csrf,
                    _method: 'DELETE'
                },
                success:function(data){
                    console.log(data);
                    location.reload();

                }
        });
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })


    });
 });


 $(function(){
    $(document).on('click','.confirm-status',function(){
    let link = $(this).data('route');
     Swal.fire({
        title: 'Are you sure?',
        text: "You want to Change Status",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, changed it!'
      }).then((result) => {
        if (result.value){
             // form.submit();
         window.location.href = link;
          Swal.fire(
            'Changed!',
            'Your status has been changed.',
            'success'
          )
        }
    })
})

});
