// 更新クリック
$("#koushin").on('click',function(){
    $.ajax({
        type:'GET',
        url:'/koushin',
    }).then((data,stts,xhr)=>{
        console.log("done",stts,data);
        // var piyo = data;
        let str = '';
        let counts = data.counts;
            data.threads.forEach((val,index)=>{str+='<div id="thread_title_box">'+'<a href='+'http://'+location.host+"/thread/"+val.id +' '+'"title="すれっど">'+'<li id="thread_title">'+val.title+counts[index]+'</li>'+'</a>'+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'+'</div>';},str,counts);
        $("#threads").html(str)},(xhR,stts,err)=>{console.log("not work",stts,err);})
}
)
$("#texts_koushin").on('click',function(){
    $.ajax({
        type:'POST',
        url:'/texts_koushin',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{"href":location.href},
    }).then((data,stts,xhr)=>{
        console.log("done_post",data);
        // var piyo = data;
        let str = '';
        let dater = (date,format)=>{
            format = format.replace(/yyyy/,date.getFullYear());
            format = format.replace(/mm/,date.getMonth()+1);
            format = format.replace(/dd/,date.getDate());
            format = format.replace(/week/,['日', '月', '火', '水', '木', '金', '土'][date.getDay()]);
            format = format.replace(/h/,date.getHours());
            format = format.replace(/min/,date.getMinutes());
            format = format.replace(/sec/,date.getSeconds());
            return format;
        };
            data.texts.forEach((val,index)=>{
                let dat = new Date(val.created_at);
                str+='<div>名前：'+ val.name + 'メール:'+val.mail + 'ID:'+ val.ip +' 投稿日:' + dater(dat,'yyyy年mm月dd日(week) h:min:sec') +
                '</div>'+'<li class="h-25 above">'+ val.text +'</li>';
            },str,dater);
        $("#texts").html(str);
    },(xhR,stts,err)=>{console.log("not work",stts,err);})
}

)