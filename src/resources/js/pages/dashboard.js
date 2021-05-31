import React from 'react';
import {connect} from 'react-redux';
import {Redirect} from 'react-router-dom';

class Dashboard extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        if (!this.props.auth.isVerified) {
            return (
                <Redirect to={'/account/confirm-email'}/>
            )
        }

        // if (!this.props.auth.hasShow) {
        //     return (
        //         <Redirect to={'/account/show/create'}/>
        //     )
        // }

        return (
            <>
                <div className="container">
                    <div className="row">
                        <div className="col-md-4">
                            <div className="card card-custom card-stretch gutter-b">
                                <div className="card-header border-0">
                                    <h3 className="card-title font-weight-bolder text-dark">Authors</h3>
                                    <div className="card-toolbar">
                                        <div className="dropdown dropdown-inline">
                                            <a href="#"
                                               className="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle"
                                               data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">August</a>
                                            <div className="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul className="navi navi-hover">
                                                    <li className="navi-header pb-1">
                                                    <span
                                                        className="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-icon">
																			<i className="flaticon2-shopping-cart-1"></i>
																		</span>
                                                            <span className="navi-text">Order</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-icon">
																			<i className="flaticon2-calendar-8"></i>
																		</span>
                                                            <span className="navi-text">Event</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-icon">
																			<i className="flaticon2-graph-1"></i>
																		</span>
                                                            <span className="navi-text">Report</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-icon">
																			<i className="flaticon2-rocket-1"></i>
																		</span>
                                                            <span className="navi-text">Post</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-icon">
																			<i className="flaticon2-writing"></i>
																		</span>
                                                            <span className="navi-text">File</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="card-body pt-2">
                                    <div className="d-flex align-items-center mb-10">
                                        <div className="symbol symbol-40 symbol-light-success mr-5">
														<span className="symbol-label">
															<img
                                                                src="/metronic/theme/html/demo1/dist/assets/media/svg/avatars/009-boy-4.svg"
                                                                className="h-75 align-self-end" alt=""/>
														</span>
                                        </div>
                                        <div className="d-flex flex-column flex-grow-1 font-weight-bold">
                                            <a href="#" className="text-dark text-hover-primary mb-1 font-size-lg">Ricky
                                                Hunt</a>
                                            <span className="text-muted">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <div className="dropdown dropdown-inline ml-2" data-toggle="tooltip" title=""
                                             data-placement="left" data-original-title="Quick actions">
                                            <a href="#" className="btn btn-hover-light-primary btn-sm btn-icon"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i className="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div className="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                <ul className="navi navi-hover">
                                                    <li className="navi-header font-weight-bold py-4">
                                                        <span className="font-size-lg">Choose Label:</span>
                                                        <i className="flaticon2-information icon-md text-muted"
                                                           data-toggle="tooltip" data-placement="right" title=""
                                                           data-original-title="Click to learn more..."></i>
                                                    </li>
                                                    <li className="navi-separator mb-3 opacity-70"></li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-success">Customer</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-primary">Member</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-separator mt-3 opacity-70"></li>
                                                    <li className="navi-footer py-4">
                                                        <a className="btn btn-clean font-weight-bold btn-sm" href="#">
                                                            <i className="ki ki-plus icon-sm"></i>Add new</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="d-flex align-items-center mb-2">
                                        <div className="symbol symbol-40 symbol-light-success mr-5">
														<span className="symbol-label">
															<img
                                                                src="/metronic/theme/html/demo1/dist/assets/media/svg/avatars/016-boy-7.svg"
                                                                className="h-75 align-self-end" alt=""/>
														</span>
                                        </div>
                                        <div className="d-flex flex-column flex-grow-1 font-weight-bold">
                                            <a href="#" className="text-dark text-hover-primary mb-1 font-size-lg">Carles
                                                Puyol</a>
                                            <span className="text-muted">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <div className="dropdown dropdown-inline ml-2" data-toggle="tooltip" title=""
                                             data-placement="left" data-original-title="Quick actions">
                                            <a href="#" className="btn btn-hover-light-primary btn-sm btn-icon"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i className="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div className="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                <ul className="navi navi-hover">
                                                    <li className="navi-header font-weight-bold py-4">
                                                        <span className="font-size-lg">Choose Label:</span>
                                                        <i className="flaticon2-information icon-md text-muted"
                                                           data-toggle="tooltip" data-placement="right" title=""
                                                           data-original-title="Click to learn more..."></i>
                                                    </li>
                                                    <li className="navi-separator mb-3 opacity-70"></li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-success">Customer</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-primary">Member</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-item">
                                                        <a href="#" className="navi-link">
																		<span className="navi-text">
																			<span
                                                                                className="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
                                                        </a>
                                                    </li>
                                                    <li className="navi-separator mt-3 opacity-70"></li>
                                                    <li className="navi-footer py-4">
                                                        <a className="btn btn-clean font-weight-bold btn-sm" href="#">
                                                            <i className="ki ki-plus icon-sm"></i>Add new</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-8">
                            <div className="card card-custom card-stretch gutter-b">
                                <div className="card-header border-0 pt-5">
                                    <h3 className="card-title align-items-start flex-column">
                                        <span className="card-label font-weight-bolder text-dark">New Arrivals</span>
                                        <span className="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                                    </h3>
                                    <div className="card-toolbar">
                                        <ul className="nav nav-pills nav-pills-sm nav-dark-75">
                                            <li className="nav-item">
                                                <a className="nav-link py-2 px-4" data-toggle="tab"
                                                   href="#kt_tab_pane_11_1">Month</a>
                                            </li>
                                            <li className="nav-item">
                                                <a className="nav-link py-2 px-4" data-toggle="tab"
                                                   href="#kt_tab_pane_11_2">Week</a>
                                            </li>
                                            <li className="nav-item">
                                                <a className="nav-link py-2 px-4 active" data-toggle="tab"
                                                   href="#kt_tab_pane_11_3">Day</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div className="card-body pt-2 pb-0 mt-n3">
                                    <div className="tab-content mt-5">
                                        <div className="tab-pane fade show active">
                                            <div className="table-responsive">
                                                <table className="table table-borderless table-vertical-center">
                                                    <thead>
                                                    <tr>
                                                        <th className="p-0 w-40px"></th>
                                                        <th className="p-0 min-w-200px"></th>
                                                        <th className="p-0 min-w-100px"></th>
                                                        <th className="p-0 min-w-125px"></th>
                                                        <th className="p-0 min-w-110px"></th>
                                                        <th className="p-0 min-w-150px"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td className="pl-0 py-4">
                                                            <div className="symbol symbol-50 symbol-light">
																				<span className="symbol-label">
																					<img
                                                                                        src="/metronic/theme/html/demo1/dist/assets/media/svg/misc/003-puzzle.svg"
                                                                                        className="h-50 align-self-center"
                                                                                        alt=""/>
																				</span>
                                                            </div>
                                                        </td>
                                                        <td className="pl-0">
                                                            <a href="#"
                                                               className="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Payrol
                                                                Application</a>
                                                            <div>
                                                                <span className="font-weight-bolder">Email:</span>
                                                                <a className="text-muted font-weight-bold text-hover-primary"
                                                                   href="#">company@dev.com</a>
                                                            </div>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-dark-75 font-weight-bolder d-block font-size-lg">$560,000</span>
                                                            <span className="text-muted font-weight-bold">Paid</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span className="text-muted font-weight-500">Laravel, Metronic</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="label label-lg label-light-success label-inline">Success</span>
                                                        </td>
                                                        <td className="text-right pr-0">
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                            <span className="svg-icon svg-icon-md svg-icon-primary">

                                                            </span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td className="pl-0 py-4">
                                                            <div className="symbol symbol-50 symbol-light">
																				<span className="symbol-label">
																					<img
                                                                                        src="/metronic/theme/html/demo1/dist/assets/media/svg/misc/005-bebo.svg"
                                                                                        className="h-50 align-self-center"
                                                                                        alt=""/>
																				</span>
                                                            </div>
                                                        </td>
                                                        <td className="pl-0">
                                                            <a href="#"
                                                               className="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">HR
                                                                Management System</a>
                                                            <div>
                                                                <span className="font-weight-bolder">Email:</span>
                                                                <a className="text-muted font-weight-bold text-hover-primary"
                                                                   href="#">hr@demo.com</a>
                                                            </div>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
                                                            <span className="text-muted font-weight-bold">Paid</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-muted font-weight-bold">AngularJS, C#</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="label label-lg label-light-danger label-inline">Rejected</span>
                                                        </td>
                                                        <td className="text-right pr-0">
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td className="pl-0 py-4">
                                                            <div className="symbol symbol-50 symbol-light">
																				<span className="symbol-label">
																					<img
                                                                                        src="/metronic/theme/html/demo1/dist/assets/media/svg/misc/014-kickstarter.svg"
                                                                                        className="h-50 align-self-center"
                                                                                        alt=""/>
																				</span>
                                                            </div>
                                                        </td>
                                                        <td className="pl-0">
                                                            <a href="#"
                                                               className="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">KTR
                                                                Mobile Application</a>
                                                            <div>
                                                                <span className="font-weight-bolder">Email:</span>
                                                                <a className="text-muted font-weight-bold text-hover-primary"
                                                                   href="#">ktr@demo.com</a>
                                                            </div>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-dark-75 font-weight-bolder d-block font-size-lg">$45,200,000</span>
                                                            <span className="text-muted font-weight-bold">Paid</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-muted font-weight-500">ReactJS, Ruby</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="label label-lg label-light-warning label-inline">In Progress</span>
                                                        </td>
                                                        <td className="text-right pr-0">
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td className="pl-0 py-4">
                                                            <div className="symbol symbol-50 symbol-light mr-1">
																				<span className="symbol-label">
																					<img
                                                                                        src="/metronic/theme/html/demo1/dist/assets/media/svg/misc/006-plurk.svg"
                                                                                        className="h-50 align-self-center"
                                                                                        alt=""/>
																				</span>
                                                            </div>
                                                        </td>
                                                        <td className="pl-0">
                                                            <a href="#"
                                                               className="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant
                                                                Outstanding</a>
                                                            <div>
                                                                <span className="font-weight-bolder">Email:</span>
                                                                <a className="text-muted font-weight-bold text-hover-primary"
                                                                   href="#">bprow@bnc.cc</a>
                                                            </div>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-dark-75 font-weight-bolder d-block font-size-lg">$2,000,000</span>
                                                            <span className="text-muted font-weight-bold">Paid</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-muted font-weight-500">ReactJs, HTML</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="label label-lg label-light-primary label-inline">Approved</span>
                                                        </td>
                                                        <td className="text-right pr-0">
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td className="pl-0 py-4">
                                                            <div className="symbol symbol-50 symbol-light">
																				<span className="symbol-label">
																					<img
                                                                                        src="/metronic/theme/html/demo1/dist/assets/media/svg/misc/015-telegram.svg"
                                                                                        className="h-50 align-self-center"
                                                                                        alt=""/>
																				</span>
                                                            </div>
                                                        </td>
                                                        <td className="pl-0">
                                                            <a href="#"
                                                               className="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Application
                                                                Development</a>
                                                            <div>
                                                                <span className="font-weight-bolder">Email:</span>
                                                                <a className="text-muted font-weight-bold text-hover-primary"
                                                                   href="#">app@dev.com</a>
                                                            </div>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600,000</span>
                                                            <span className="text-muted font-weight-bold">Paid</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="text-muted font-weight-500">Python, MySQL</span>
                                                        </td>
                                                        <td className="text-right">
                                                            <span
                                                                className="label label-lg label-light-warning label-inline">In Progress</span>
                                                        </td>
                                                        <td className="text-right pr-0">
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                            <a href="#"
                                                               className="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span
                                                                                    className="svg-icon svg-icon-md svg-icon-primary">

																				</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
        return {
            auth: state.Auth,
        }
    }
;

export default connect(mapStateToProps)(Dashboard)
