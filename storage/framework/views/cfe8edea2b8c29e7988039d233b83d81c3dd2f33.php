  <script>
    $(document).ready(function(){
      $('.switch').click(function(){
        $(this).toggleClass('checked');
        $('input[name="status"]').not(':checked').prop("checked", true);
      });
    });
  </script><?php /**PATH C:\Users\d.gutierrezg\Desktop\laravel-auth\resources\views/scripts/toggleStatus.blade.php ENDPATH**/ ?>