$(function () {
  $('[data-toggle="popover"]').popover()
});
        
        var date = getRelativeDate();

        $('#countdown').timeTo({
            timeTo: date,
            displayDays: 1,
            theme: "white",
            displayCaptions: true,
            fontSize: 24,
            captionSize: 12,
            callback: true,
        });

        function getRelativeDate(days, hours, minutes){
            
            var countd = 16,
                countmo = '0' + ( (new Date().getMonth()) + 2 ),
                county = new Date().getFullYear();

            var countdate = '' + county + '/' + countmo + '/' + countd + ' 00:00:00',
                date = new Date(countdate);

            return date;

        }
    