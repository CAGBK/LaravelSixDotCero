  <script>
    $(document).ready(function(){
      $('.switch').click(function(){
        $(this).toggleClass('checked');
        $('input[name="status"]').not(':checked').prop("checked", true);
      });
    });
  </script><?php /**PATH /home/nnvr64fpyv0g/LaravelSixDotCero/resources/views/scripts/toggleStatus.blade.php ENDPATH**/ ?>