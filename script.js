
  document.getElementById("resend").onclick = function() {
    const options = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          apikey: 'eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJhcGltX3B1YkBjYXJib24uc3VwZXIiLCJhcHBsaWNhdGlvbiI6eyJvd25lciI6ImFwaW1fcHViIiwidGllclF1b3RhVHlwZSI6bnVsbCwidGllciI6IlVubGltaXRlZCIsIm5hbWUiOiJzcmliaGFneWFsYWtzaG1pLWFwcG9uZSIsImlkIjo5MSwidXVpZCI6Ijk4ZGM5OWQxLWYzNTItNDAzNy05YWU3LTFkMjAyYzRhYTIwNiJ9LCJpc3MiOiJodHRwczpcL1wvMTAuMC4xLjIyMjo5NDQzXC9vYXV0aDJcL3Rva2VuIiwidGllckluZm8iOnsiVW5saW1pdGVkIjp7InRpZXJRdW90YVR5cGUiOiJyZXF1ZXN0Q291bnQiLCJncmFwaFFMTWF4Q29tcGxleGl0eSI6MCwiZ3JhcGhRTE1heERlcHRoIjowLCJzdG9wT25RdW90YVJlYWNoIjp0cnVlLCJzcGlrZUFycmVzdExpbWl0IjowLCJzcGlrZUFycmVzdFVuaXQiOm51bGx9fSwia2V5dHlwZSI6IlBST0RVQ1RJT04iLCJwZXJtaXR0ZWRSZWZlcmVyIjoiIiwic3Vic2NyaWJlZEFQSXMiOlt7InN1YnNjcmliZXJUZW5hbnREb21haW4iOiJjYXJib24uc3VwZXIiLCJuYW1lIjoic21zIiwiY29udGV4dCI6IlwvdjFcL3NtcyIsInB1Ymxpc2hlciI6ImFwaW1fcHViIiwidmVyc2lvbiI6InYxIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9XSwicGVybWl0dGVkSVAiOiIiLCJpYXQiOjE2NTcyNjA2OTEsImp0aSI6ImQyNTkwNzNhLWI0NjUtNDRmNy04NmYyLTc1NjQyZjM0NmVkMCJ9.h8pRN_KRq8VRlfr-DL-2Dn4gLiKxm3XxYqb_GUJ_SqlQY0k-IMVyxLrVA_XHCziJPzwM5vy2-_ZycghxBUeAIWSuRAC6gktJUW-5WPEFlaXgeuTEzzv_bhuiYqb3w0nZR_4fmHQcTs6DsR9ka96xAdDt0xxuLZ5oJN7RrsO_JypkyKP26jlubFgj2cmHRkgQlAciwiafj6ASxkjwW0l8rzAzUepxEixoOEQm0NdQHmArs4vv-RuQPLR2LCB9J_Je5oOYhWrkBusp5EuB4jKh7sDHiCKNCNL_Qn2U13F3JJzBHMUfKe9JLyuDvjgY6wYlIlsyQV5e0VdpXsQWNU_osA=='
        },
        body: '{"sender_id":"CNTKAR","type":"text","message":"[%OTP%] is the OTP for login/download to Connect Karnataka - By IND Whales. Do not share it with anybody.","recipient":[{"to":["919845498052"],"variables":{"OTP":"2134"}}],"country_specific":[{"country":"91","entity_id":"1201166540617449751","template_id":"1207166678377936202"}]}'
      };
  fetch('https://api.koreroplatforms.com/v1/sms/send', options)
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(err => console.error(err));
}