const axios = require("axios");
const https = require("https");const btoa = require("btoa");

const api_key = "<api_key>";
const secret_key = "<secret_key>";
const content_type = "application/json";
 
function disburse() {
  axios
    .post(
      "https://apipay.beem.africa/webservices/disbursement/transfer",
      {
       amount: "10000",
       scheduled_time_utc: "2021-04-20 10:10:10",
       client_reference_id: "11212919190101",
       source: {
         account_no: "f09dc0d3",
         currency: "TZS"
       },
       destination:  {
         mobile: {
         wallet_number: "255701000000",
         wallet_code: "ABC12345", 
         currency: "TZS"
       }}
     },
      {
        headers: {
          "Content-Type": content_type,
          Authorization: "Basic " + btoa(api_key + ":" + secret_key),
        },
        httpsAgent: new https.Agent({
          rejectUnauthorized: false,
        }),
      }
    )
    .then((response) => response)
    .catch((error) => console.error(error.response.data));
}

disburse();