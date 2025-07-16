// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    columnDefs: [
        {
            orderable: false,
            render: DataTable.render.select(),
            targets: 0
        }
    ],
    select: {
        style: 'os',
        selector: 'td:first-child'
    },
    order: [[1, 'asc']]
});
