import React from "react";
const axios = require('axios');
import { baseUrl, token } from "../constants/constants";
import Axios from "axios";


export const getRequest = () => {
   axios({
    method: "get",
    baseURL : `${baseUrl}/api/allParents/1`,
    headers : {
        'Authorization' : `Bearer eyJpdiI6IjJyRHJacW1udGhkbEg3dzF0Z0xuSnc9PSIsInZhbHVlIjoiYlpnTWFMdXRkSDhHamNTcWVON0ZcL1BQc012MkhkOGthdHpFVlcwaGNaUHR6RkFHaU9hSktFT290Z0lnSEo5aXYiLCJtYWMiOiJiMzBhZDUxNjAxNzA5MjgyNjUxYjViNWEyYzk3MWI4ZjExZWM3ODE3NmFlN2VlY2JhZGQ4MzYzY2ZjNjA5MTZmIn0%3D`
    }
   }).then((res) =>{
       console.log(res);
   }).catch((err) => {
       console.log(err)
   })
}