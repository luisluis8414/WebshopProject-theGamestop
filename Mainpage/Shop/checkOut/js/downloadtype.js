$(document).ready(function() {

    var lastChange=0;

    $('#download').change(function() {
      var selectedOption = $(this).val();
      let total=0;
      var sum = parseFloat($('#cartFooter').text().slice(0, -1));
      sum-=lastChange;
      lastChange=0;

      if (selectedOption === 'Downloadlink') {
        console.log("asdfawsdf"+total)
        $('#fees').removeClass();
        $('#fees').addClass('list-group-item d-flex justify-content-between');
        $('#fees').find('span').html("Downloadlink");
        $('#fees').find('strong').html("+2$");
        lastChange=2;
        total=sum+2;
         $('#cartFooter').html("<strong>" + total.toFixed(2) + "$</strong>");
      } else if (selectedOption === 'Zip for Hard Drive') {
        $('#fees').removeClass();
        $('#fees').addClass('list-group-item d-flex justify-content-between');
        $('#fees').find('span').html("Zip for Hard Drive");
        $('#fees').find('strong').html("+6$");
        lastChange=6;
        total=sum+6;
         $('#cartFooter').html("<strong>" +  total.toFixed(2) + "$</strong>");
      } else if (selectedOption === 'Add them to my account') {
        $('#fees').removeClass();
        $('#cartFooter').html("<strong>" +  sum.toFixed(2) + "$</strong>");
      }
    });
  });
  