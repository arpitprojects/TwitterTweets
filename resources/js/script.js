/*Ajax call for taking the json outputed at core/index.php JSON*/

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        var statuses = this.responseText;

        var status = [];

        var page;

        //Json from php from javascript 
        //Json array
        status = eval('[' + statuses + ']');  
        

        //Lopping through all the json array
        for(i=0;i < status.length ;i++){

            var arr_hash = [];
            var time;
            var time_format = [];
            //HashTags from the json for each post embedded as <a href=""></a>
            
            for(j=0;j<status[i].hashtags.length;j++){
                arr_hash.push('<a href="#!">'+status[i].hashtags[j].text+'</a>');
            }
            //console.log(status[i].time);
            //Time ouputted.
            
            time_format = (status[i].time).split(" ");
            var time = time_format[0]+" "+time_format[1]+" "+time_format[2];
            arr_hash_str = arr_hash.join(' #');
            
            //appending the html to the HTML DOM.
            document.getElementById('page-content-wrapper').innerHTML += '<div class="post" id="'+status[i].id+'"><div class="user"><div class="avatar left"><img src="'+status[i].profile_pic +'"/></div><ul class="user-line"><li class="name" id="name">'+status[i].name+'</li><li class="session_name" id="session_name">@'+status[i].screen_name+'</li><li class="time">'+time+'</li>'
                +'<br />'+'<li><p class="post_det" id="post_det">'+status[i].post+'</p></li>'+
                '</ul>'+
                '</div>'+
                '<div class="clearfix"></div>'+
                '<div class="post_content" onclick="warn()">#'+
                arr_hash_str
                +'</div>'+
                '<br />'
                +'<div class="tweet_fav"><ul class="rep-ret"><li class="rep" id="rep"><i class="fa fa-reply"></i></li><li class="ret" id="ret"><i class="fa fa-retweet"></i>  '+status[i].retweet+'</li><li class="fav" id="fav"><i class="fa fa-heart"></i> '+status[i].fav+'</li></ul></div></div>'+
                '<br /><br />';

        }

    }
};
//Ajax the whole file here with pure javascript
xhttp.open("GET", "core/index.php", true);
xhttp.send();
