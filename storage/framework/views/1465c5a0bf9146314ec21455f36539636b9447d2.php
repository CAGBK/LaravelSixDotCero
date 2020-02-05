<script type="text/javascript">
    $(document).on('mouseenter', "div.activity-table table > tbody > tr > td ", function () {
        var $this = $(this);
        if (this.offsetWidth < this.scrollWidth && !$this.attr('title')) {
            $this.attr('title', $this.text());
        }
    });
</script>
<?php /**PATH C:\Users\ca.gonzalezb1\Desktop\LaravelSixDotCero\vendor\jeremykenedy\laravel-logger\src/resources/views//scripts/add-title-attribute.blade.php ENDPATH**/ ?>