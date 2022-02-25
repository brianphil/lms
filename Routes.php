<?php

/**Logic for implementing the routing protocal */
/**route index to login */
Route::set('index.php', function () {
    Login::createView('Login');
});
/**route for login */
Route::set('login', function () {
    Login::createView('Login');
});
/**route for home */
Route::set('home', function () {
    Home::createView('Home');
});

/**route for customers */
Route::set('customers', function () {
    Home::createView('Customer');
});
/**route for new customer */
Route::set('newcustomer', function () {
    Home::createView('NewCustomer');
});
/**route for customer autosearch */
Route::set('customerautosearch', function () {
    Home::createView('CustomerAutosearch');
});
/**route for update/delete customer */
Route::set('updatecustomer', function () {
    Home::createView('UpdateCustomer');
});




/**route for loans */
Route::set('loans', function () {
    Home::createView('Loan');
});
/**route for new loan */
Route::set('newloan', function () {
    Home::createView('NewLoan');
});
/**route for payments */
Route::set('payments', function () {
    Home::createView('Payment');
});
/**route for payment schedules */
Route::set('paymentschedule', function () {
    Home::createView('PaymentSchedule');
});
/**route for missed_payments */
Route::set('missedpayments', function () {
    Home::createView('MissedPayment');
});
/**route for red listed customers */
Route::set('redlistedcustomers', function () {
    Home::createView('RedListedCustomers');
});
/**route for reports */
Route::set('reports', function () {
    Home::createView('Report');
});
/**route for hr_module */
Route::set('hrmodule', function () {
    Home::createView('HrModule');
});
/**route for register new employee */
Route::set('registernewemployee', function () {
    Home::createView('RegisterNewEmployee');
});
/**route for branch_manager */
Route::set('branchmanager', function () {
    Home::createView('BranchManager');
});
