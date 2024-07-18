document.addEventListener('DOMContentLoaded', function() {
    // Reset button functionality
    document.querySelector('.reset-button').addEventListener('click', function() {
        document.getElementById('date').value = '';
        document.getElementById('user').value = '';
        document.getElementById('customer').value = '';
        document.getElementById('module').value = '';
        document.getElementById('sales-order').value = '';
    });
 
    // Row click functionality
    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('click', function() {
            const href = this.getAttribute('data-href');
            if (href) {
                window.location.href = href;
            }
        });
    });
 
    // Row coloring based on status
    const rows = document.querySelectorAll("tbody tr");
 
    rows.forEach(row => {
        const statusCell = row.querySelector("td:nth-last-child(2)"); // Assuming 'Status' is the second last column
        if (statusCell) {
            const status = statusCell.textContent.trim().toLowerCase();
            row.classList.remove('status-pending', 'status-fail', 'status-pass'); // Remove any previous status classes
            switch(status) {
                case 'p':
                    row.classList.add('status-pending');
                    break;
                case 'f':
                    row.classList.add('status-fail');
                    break;
                case 'a':
                    row.classList.add('status-pass');
                    break;
                default:
                    break;
            }
        }
    });

    // Set current date as default value
    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().split('T')[0];
    document.getElementById('currentDate').value = formattedDate;
});
 