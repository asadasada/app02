console.log("test11");
// function ajax_Y(){
//     let d = new $.Deferred();
//     $.ajax({
//        type:'POST',
//        url:'testX',
//        data:{"Hoge":"piyo"},
//     }).then(()=>{console.log("got done");},(e)=>{console.dir(e); return new $.Deferred().resolve().promise();}).then(()=>{console.log("done");});
// }
$("#piyo").on("click",()=>{
    $.ajax({
       type:'POST',
       url:'./testX.php',
       data:{"Hoge":"piyo"},
    }).then((data,stts,xhr)=>{
        console.log("done");
        console.log(stts,data);
},(xhR,stts,err)=>{console.log("not work");console.log(xhR,stts,err);})
})