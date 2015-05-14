$(document).ready(function() {
    $('form.DistributorForm #Description textarea ').keyup(function() {
        var len = this.value.length;
        if (len >= 200) {
            this.value = this.value.substring(0, 200);
        }
        $('form.DistributorForm #Description #charLeft').text(200 - len);
    });
});