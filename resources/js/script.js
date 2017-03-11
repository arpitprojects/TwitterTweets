var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        var statuses = this.responseText;

        var status = [];

        var page;

        status = eval('[' + statuses + ']');  



        for(i=0;i < status.length ;i++){

            var arr_hash = [];

            for(j=0;j<status[i].hashtags.length;j++){
                arr_hash.push('<a href="#!">'+status[i].hashtags[j].text+'</a>');
            }

            arr_hash_str = arr_hash.join(' #');

            document.getElementById('page-content-wrapper').innerHTML += '<div class="post" id="'+status[i].id+'"><div class="user"><div class="avatar left"><img src="'+status[i].profile_pic +'"/></div><ul class="user-line"><li class="name" id="name" style="margin-top:4px;font-weight:700;">'+status[i].name+'</li><li class="session_name" id="session_name" style="font-weight:600;">@'+status[i].screen_name+'</li>'
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
xhttp.open("GET", "core/index.php", true);
xhttp.send();
