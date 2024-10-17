import executeExample from "../../../public/assets/js/pages/sweetalert.init.js";

let activityTypeSelectr = new Selectr('#activity-type');

$(document).ready(function () {
    initTimeLogsCRUD();
});

function initTimeLogsCRUD() {
    $('#formSubmit').on('submit', handleFormSubmit);
    $('.btn-edit').on('click', handleEditClick);
    $('.btn-delete').on('click', handleDeleteClick);
    $('.btn-close').on('click', clearFormFields);
}

function handleFormSubmit(e) {
    e.preventDefault();
    let id = $('#id').val();
    let url = '/api/time-logs/' + id;
    let method = 'PUT';
    let message = 'updated';
    let activityType = $('#activity-type option:selected').text().trim();
    let fromTimeString = $('#from-time').val();
    let toTimeString = $('#to-time').val();
    let fromTime = new Date($('#from-time').val());
    let toTime = new Date($('#to-time').val());
    let rate = $('#activity-type').val();
    let hours = (toTime - fromTime) / (1000 * 60 * 60);
    let totalIDR = rate * hours;
    executeExample('createOrUpdate', message).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: method,
                data: {
                    _token: $('input[name="_token"]').val(),
                    activity_type: activityType,
                    from_time: fromTimeString,
                    to_time: toTimeString,
                    hours: hours,
                    billing_amount: totalIDR,
                },
                success: function (response, textStatus, xhr) {
                    console.log(response);
                    if (textStatus === 'success' && xhr.status === 200) {
                        executeExample('success', response.message).then(() => {
                            $('#formSubmit')[0].reset();
                            location.reload();
                        });
                    } else {
                        executeExample(textStatus === 'error' || xhr.status, response.message);
                    }
                },
                error: function (xhr, textStatus, error) {
                    executeExample('error', xhr.responseJSON.message);
                }
            });
        }
    });
}
function handleEditClick() {
    let id = $(this).data('id');
    $.get('/api/time-logs/' + id, function (data) {
        $('#id').val(data.id);
        $('#timesheet').val(data.timesheet_name_id);
        $('#from-time').val(data.from_time);
        $('#to-time').val(data.to_time);
        activityTypeSelectr.setValue(data.activity_type.rate);
        $('#modalcenter').addClass('block');
    });
}
function clearFormFields() {
    $('#time_logs_id').val('');
    $('#activity-type').val('');
    $('#from-time').val('');
    $('#to-time').val('');
    activityTypeSelectr.clear();
    $('#modalcenter').removeClass('block');
}
function handleDeleteClick() {
    let id = $(this).data('id');
    executeExample('warningConfirm').then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: '/api/time-logs/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response, textStatus, xhr) {
                    if (textStatus === 'success' && xhr.status === 200) {
                        executeExample(textStatus, response.message).then(() => {
                            location.reload();
                        });
                    } else {
                        executeExample(textStatus === "error", response.message);
                    }
                },
                error: function (response, textStatus, xhr) {
                    executeExample(textStatus === 'error', xhr.responseJSON.message);
                }
            });
        }
    });
}
