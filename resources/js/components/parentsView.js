import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Table} from "reactstrap";
import { token } from '../constants/constants';
import {getRequest} from "../network/services.jsx";

export default class ParentsView extends Component {

    componentDidMount(){
        getRequest();
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12">
                        <Table>
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Picture
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Creation date
                                    </th>
                                    <th className="text-right">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
        <th scope="row"></th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                            </tbody>
                        </Table>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<ParentsView />, document.getElementById('example'));
}
