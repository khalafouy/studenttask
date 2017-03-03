$(function(){

        function resetInputs(row) {
            $(row).children().find('input,select').each(function(){
                $(this).val('');
            });
        }
        $(document).on('click','.add_row',function (e) {
           e.preventDefault();
            var container=$(this).parents().eq(2);
           var row=$(this).parents().eq(1);
           var new_row=row.clone();

           resetInputs(new_row) ;
            container.append(new_row);

        });
        $(document).on('click','.minus_row',function (e) {
            e.preventDefault();

            var container=$(this).parents().eq(2);
            var row=$(this).parents().eq(1);
            if(container.find('.apply_copy').length > 1)
            {
                row.remove();
            }


        });
    });