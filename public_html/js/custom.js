(function ($) {

    $(document).ready(function () {
        $('.delete-data').click(function (e) {
            e.preventDefault(); // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    });

})(jQuery);


var form = new Vue({
    el: '#youtube',
    data() {
        return {
            result: '',
            disabled: true,
        };
    }, mounted() {

    }, methods: {
        linkChanged: function () {
            axios.post('/get-video', {'link': this.$refs.link.value}).then(result => {
                this.result = result.data;
                if ('<div>' == this.result.substr(0, 5))
                    this.disabled = false;
            }).catch(err => {
                console.log(err);
            });
        }
    },
});