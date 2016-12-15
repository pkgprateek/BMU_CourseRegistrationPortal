$(document).ready(function () {
    var pageL = '';
    $('#pagination').twbsPagination({
        totalPages: 10,
        visiblePages:3,
        onPageClick: function (event, page) {
            pageL=page;
            getData(pageL);
        }
    });
    $('#search').on('keyup change', function(){
        getData(pageL);
    });
    $('#batchYear').change(function(){
        getData(pageL);
    });
    $('#branch').change(function(){
        getData(pageL);
    });
});

$("#checkAll").change(function () {
    // if($(this).is(":checked"))
    //     $('#deleteChecked').slideDown();
    // else
    //     $('#deleteChecked').fadeOut();
    $(".checkBox").prop('checked', $(this).prop("checked"));
});

function getData(page) {
    var arr = 0;
    $.ajax({
        type: 'get',
        url: "view-students/search?page=" + page,
        dataType: "json",
        data: {'search': $('#search').val(), 'batch': $('#batchYear').val(), 'branch': $('#branch').val()},
        success:function(data){
            var result = (data["data"]);
            var rows = '';
            $(result).each(function (key, value) {
                rows = rows + '<tr>'+
                            '<td><input type="checkbox" name="chkbox" value=' + value.registration_id + ' class="checkBox"></td>' + 
                            '<td><strong>' + ++arr + '.</strong></td>' + 
                            '<td>' + value.registration_id + '</td>' + 
                            '<td class="left-align">' + value.name +'</td>' + 
                            '<td>' + value.batch_year + '</td>' + 
                            '<td>' + value.specialization + '</td>' + 
                            '<td>' + value.contact + '</td>' + 
                            '<td><a href="profileStudent/'+ value.registration_id +'" class="btn btn-default btn-primary btns">Open</a></td>'+
                        '</tr>';
            });
            $('tbody').html(rows);
        }
    });
}

$('#deleteChecked').click(function () {
    $("input[name=chkbox]:checked").each(function () {
        $.ajax({
            url: 'deleteStudents/' + $(this).val(),
            type: 'get',
            success: function () {
                $("input[name=chkbox]:checked").closest("tr").fadeOut();
                window.location.reload(true);
            }
        });
    });
});