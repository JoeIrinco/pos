  

id="checkNumber" replace to input_check_number          show_checkNumber replace to div_check_number
id="bank"       replace to input_bank                   show_bank       replace to div_bank
id="checkDate"  replace to input_check_date             show_checkDate  replace to div_check_date






div_checkNumber
input_check_number

div_bank
input_bank

div_check_date
input_check_date

div_card_number
input_card_number

div_ref#
input_ref#


















            LABEL                                       ID                                              DATABASE






            labelpayment
            labeltranstype

            labelvatornonvat

            labelstatus = debit or creadit
            
            labelidnumber
            labelcheckdate
            labelbank
            labelchecknumber





























1   <label>Invoice No.:</label>             <input type="text" id="invoice">                            invoice_no

2   <label>Transaction Date:</label>        <input id="invoiceDate">                                    created_at

3   <label>Account Name:</label>            <input  id="accountName">                                   customer_name

4   <label>Address:</label>                 <input type="text" id="address" >                           customer_address 

5   <label>Transaction Type:</label>        <select  id="transactionType" ></select>                    transaction_type

6   <label>Check Number:</label>            <input type="text" id="checkNumber">                        check_no

7   <label>Check Date:</label>              <input id="checkDate">                                      check_date

8   <label>ID Number:</label>               <input type="text" id="idNumber">                           id_no

9   <label>Bank:</label>                    <input type="text" id="bank" >                              bank_name

10  <label>EWT:</label>                     <label id="ewt"></label>                                    ewt

11  <label>VAT-Exempt Sales:</label>        <label id="vatexempt"></label>                              vat_exempt    

12  <label>NET of VAT:</label>              <label id="netofvat"></label>                               net_of_vat

13  <label>VAT:</label>                     <label id="vat"></label>                                    vat

14  <label>Discount:</label>                <label id="discount"></label>                               discount

15  <label>Total Sales (VAT Inclusive):     <label id="total"></label>                                  total

16  <label>Total Amount Due:</label>        <label id="finaltotal"></label>                             final_total  



/*if (transactionTypeInput === 'CHECK'){
    if(checkNumberInput === '' || checkDateInput === ''){
        Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Oops, it looks like something is missing!',
                showConfirmButton: false,
                timer: 800
            });
            return false;
    }
} */

                                                            
                                                                
                                                            
















































