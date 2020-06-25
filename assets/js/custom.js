//Loading Function
function loading(thid,txr,status) {
    if (status == 'on') {
        $(thid).attr('disabled','');
        var htm = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+txr;
        $(thid).html(htm);
    }else if(status == 'off'){
        $(thid).removeAttr('disabled');
        $(thid).text(txr);
        $('.spinner-border').hide();
    }

}
// Showalert 
function alertr(mod,txt) {
    var htm = '<div class="alert alert-'+mod+' alert-dismissible fade show" role="alert">'+txt+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
    $('#alert').html(htm);
    $('#alert').fadeIn();
    function timeoutfun() {
        $('#alert').fadeOut()
    }
    setTimeout(timeoutfun, 2000);
}

// Creating Repo
$('#saveRsepo').click(function () {
    loading($(this),'Saving Repository','on');
    var url = $('#cloneurl').val();
    var path = $('#clonepath').val();
    var token = $('#ptoken').val();
    var RepoName = $('#reponame').val();
    var GitRepoName = $('#GitRepoName').val();
    var GitRepoBranch = $('#GitRepoBranch').val();
    var action = 'GeneratingRepo';
    $.ajax({
        url:'files/action.php',
        method:'POST',
        data:{url:url,path:path,action:action,token:token,RepoName:RepoName,GitRepoName:GitRepoName,GitRepoBranch:GitRepoBranch},
        success : function (data) {
            var Return = JSON.parse(data);
            if(Return.msg == "Working"){
                loading('#saveRsepo','Saved','off');
                $('#exampleModal').modal('hide');
                $('#formMod').trigger("reset");
                alertr("success","Repository Cloned Successfully");
                location.reload();
              }else{
                loading('#saveRsepo','Error','off');
                alertr("danger","Something wrong try again");
              }
            }
    });
});
//Editing Repo
$('edit').click(function () {
    $('#saveRsepo').hide();
    $('#newedb').show();
    var RepoName = $(this).attr('data');
    var url = $('#cloneurl').val();
    var path = $('#clonepath').val();
    var token = $('#ptoken').val();
    var GitRepoBranch = $('#GitRepoBranch').val();
    var GitRepoName = $('#GitRepoName').val();
    var action = 'EditRepo';
    $.ajax({
        url:'files/action.php',
        method:'POST',
        data:{action:action,RepoName:RepoName},
        success : function (data) {
            var Return = JSON.parse(data);
            if(Return.msg == "Working"){
                $('#reponame').val(Return.RepoName);
                $('#cloneurl').val(Return.RepUrl);
                $('#clonepath').val(Return.ClonePath);
                $('#GitRepoName').val(Return.GitRepoName);
                $('#GitRepoBranch').val(Return.GitRepoBranch);
                $('#ptoken').val(Return.Token);
                console.log(Return);
              }else{
                alertr("danger","Something wrong try again");
              }
            }
    });
});
// Update Repo
$('body').on('click', '#newedb', function () {
    loading($(this),' Updating Repository','on');
    var url = $('#cloneurl').val();
    var path = $('#clonepath').val();
    var token = $('#ptoken').val();
    var RepoName = $('#reponame').val();
    var GitRepoBranch = $('#GitRepoBranch').val();
    var GitRepoName = $('#GitRepoName').val();
    var action = 'GeneratingRepo';
    $.ajax({
        url:'files/action.php',
        method:'POST',
        data:{url:url,path:path,action:action,token:token,RepoName:RepoName,GitRepoBranch:GitRepoBranch,GitRepoName:GitRepoName},
        success : function (data) {
            var Return = JSON.parse(data);
            if(Return.msg == "Working"){
                loading('#saveRsepo','Saved','off');
                $('#exampleModal').modal('hide');
                $('#formMod').trigger("reset");
                alertr("success","Repository Updated Successfully");
              }else{
                loading('#saveRsepo','Error','off');
                alertr("danger","Something wrong try again");
              }
            }
    });
 });
//Editing Repo
$('extracter').click(function () {
    var idn = $(this).attr('type');
    var id = "#Extracting"+idn;
    loading(id,' Extracting...','on');
    var RepoName = $(this).attr('data');
    var action = 'Extracting';
    $.ajax({
        url:'files/action.php',
        method:'POST',
        data:{action:action,RepoName:RepoName},
        success : function (data) {
            loading(id,' Extracted','off');
            var Return = JSON.parse(data);
            if(Return.msg == "Working"){
                alertr("success","Repository Extraded");
              }else{
                alertr("danger",Return.msg);
              }
            }
    });
});
$('#closeMod').click(function () {
     $('#formMod').trigger("reset");
})
// DeleteRepo
$('dell').click(function () {
    var idn = $(this).attr('type');
    var id = "#dell"+idn;
    loading(id,' Deleting Repo...','on');
    var RepoName = $(this).attr('data');
    var action = 'DeleteRepo';
    $.ajax({
        url:'files/action.php',
        method:'POST',
        data:{action:action,RepoName:RepoName},
        success : function (data) {
            loading(id,' Deleted','off');
            var Return = JSON.parse(data);
            if(Return.msg == "Working"){
                alertr("success","Repository Deleted");
                location.reload();
              }else{
                alertr("danger",Return.msg);
              }
            }
    });
});