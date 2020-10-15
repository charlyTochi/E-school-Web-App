import Cookies from "universal-cookie";

const cookies = new Cookies();

export const baseUrl = "http://127.0.0.1:8002";

export const token = () => {
    return cookies.get("XSRF-TOKEN");
}