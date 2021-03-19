function countAreaChars(areaName,limit)
			{

             if(areaName.value.length > limit)  {
                areaName.value= areaName.value.substring(0,limit);
                alert("Data length too long");
                }
			}

//maximum length of tender name is 100
function validateTenderName(tname) {
        if (tname.length ==0) {

       return true;
       }
       else if (tname.length >100) {
                alert("data length is too long");
                return false;
                }
 }
 ////maximum length of tender description is 200
function validateTenderDesc(tdesc) {
        if (tdesc.length ==0) {
       return true;
       }

       else if (tdesc.length >200) {
                alert("data length is too long");
                 return false;
                }

}
function validateWinnerForm(form) {

 var flage = false;
    //var radios = form.winnerStatus;
   // alert(form.winnerStatus.length);
    for (var i = 0; i < form.winnerStatus.length; i++) {
       if (form.winnerStatus[i].checked == true) {
 		flage = true;

      }
    }
    if (!flage) {
        alert("Please select one of company in the bidding list");
        return false;
    }



if (form.winnerReason.value==null || form.winnerReason.value=="")  {
alert("Please enter reason of winner.");
return false;
}
}//end winner validate

function validateBidForm(form) {
if (form.bidPrice.value==null || form.bidPrice.value=="")  {
alert("Bidding Price must be entered");
return false;
}
if (!form.bidPrice.value.match(/^[0-9]*$/) )  {
alert("Bidding Price must be integer");
return false;
}
if (form.bidPrice.value<=0 )  {
alert("Bidding Price is not less than 1");
return false;
}
if (form.bidPrice.value.length > 10) {
alert("Not more than 10 digits for bidding price" );
return false;
}
}//validateBidForm

//Compare Date Function

       function convert(str1) {
        var mon1 = str1.substring(0,3);
          switch(mon1) {
 	case "Jan" :  var mon1 ="01"; break;
	case "Feb" :  var mon1 ="02";break;
	case "Mar" :  var mon1 ="03";break;
	case "Apr" :  var mon1 ="04";break;
	case "May" :  var mon1 ="05";break;
    case "Jun" :  var mon1 ="06";break;
	case "Jul" :  var mon1 ="07";break;
	case "Aug" :  var mon1 ="08";break;
	case "Sep" :  var mon1 ="09";break;
	case "Oct" :  var mon1 ="10";break;
	case "Nov" :  var mon1 ="11";break;
	case "Dec" :  var mon1 ="12";
        }
        var dt1 = str1.substring(4,6);
        var yr1  = str1.substring(7,11);
        var hr1  = str1.substring(12,15);
        var min1  = str1.substring(15,18);
        sdate = yr1 + "-" + mon1 + "-" + dt1 + " " + hr1 + ":" + min1;
        return sdate;
         }
         function parseDate(input) {

            var parts = input.match(/(\d+)/g);
            return new Date(parts[0], parts[1]-1, parts[2], parts[3], parts[4]);
              }

//check after submit form whether all input text fields are blank and date validation
function validateTenderForm(form) {

var myindex=form.Category.selectedIndex;
if (myindex==0) {
alert("Please select category of business");
 return false;
}
if (form.tenderName.value==null || form.tenderName.value=="") {
alert("Tender name is blank.");
return false;
}
if (form.tenderDescription.value==null || form.tenderDescription.value=="") {
alert("Tender description is blank.");
return false;
}
if (form.startPeriod.value==null || form.startPeriod.value==""){
alert("Invalid date");
return false;
}
if (form.endPeriod.value==null || form.endPeriod.value==""){
alert("Invalid date");
return false;
}
if (form.dateNotice.value==null || form.dateNotice.value==""){
alert("Invalid date");
return false;
}
if (form.dateClose.value==null || form.dateClose.value==""){
alert("Invalid date");
return false;
}
if (form.dateDisclose.value==null || form.dateDisclose.value==""){
alert("Invalid date");
return false;
}
if (form.estimatedPrice.value==null || form.estimatedPrice.value==""){
alert("Estimated Price is blank");
return false;
}
if (form.estimatedPrice.value.length > 10) {
alert("Estimated price should not more than 10 digits" );
return false;
}
if (!form.estimatedPrice.value.match(/^[0-9]*$/) )  {
alert("Estimated Price should be integer");
return false;
}
if (form.estimatedPrice.value <= 0 )  {
alert("Estimated Price should be greater than 0");
return false;
 }
 //convert today date to mmm-dd-yyyy format and compare with other date
//var now = new Date();
//var today = dateFormat(now,"yyyy-mm-dd HH:mm");
//var currentDate = today.toString();
var currentDate= form.currentDate.value;
//alert(currentDate);
var notice = form.dateNotice.value +'  ' + form.hour.value+':' + form.minute.value+ ':00';
var noticeDate=convert(notice);

var close = form.dateClose.value +'  ' + form.hour1.value+':' + form.minute1.value+ ':00';
var closeDate  =convert(close);
//alert(closeDate);
var disclose = form.dateDisclose.value +'  ' + form.hour2.value+':' + form.minute2.value+ ':00';
var discloseDate =convert(disclose) ;
//alert(discloseDate);
var startPeriod  =form.startPeriod.value + ' 00:00';
var startDate  = convert(startPeriod);
var endPeriod  = form.endPeriod.value + ' 00:00';
var endDate  = convert(endPeriod);
 //alert(parseDate(currentDate));
 //alert(parseDate(noticeDate));

if (parseDate(currentDate)  >=  parseDate(noticeDate)) {
              alert ("The date order is incorrect.Notice date should after than today date !");
              return false;
            }

else if (parseDate(noticeDate)  >=  parseDate(closeDate)) {
              alert ("The date order is incorrect.The date order is incorrect.Close date should after than notice date !");
              return false;
            }

else if (parseDate(closeDate)  >=  parseDate(discloseDate)) {
              alert ("The date order is incorrect.Disclose date should after than close date !");
              return false;
            }



else if (parseDate(discloseDate)  >=  parseDate(startDate)) {
              alert ("The date order is incorrect.Term of construction start date should after than disclose date !");
              return false;
            }

else if (parseDate(startDate)  >=  parseDate(endDate)) {
              alert ("The date order is incorrect.Term of construction end date should after than start date !");
              return false;
            }


}  // end tender register form validate




