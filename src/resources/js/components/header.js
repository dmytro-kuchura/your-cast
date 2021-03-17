import React from 'react';
import {Link} from 'react-router-dom';
import {connect} from 'react-redux';
import {profile} from '../services/auth-service';

const opened = {display: 'none'};
const closed = {display: 'block'};

class Header extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            user: null,
            dropdownMenu: false
        };

        this.handleDropdown = this.handleDropdown.bind(this);

        props.dispatch(profile());
    }

    componentDidUpdate(prevProps) {
        if (prevProps.user !== this.props.user) {
            this.setState({user: this.props.user})
        }
    }


    handleDropdown(event) {
        event.preventDefault();

        this.setState({dropdownMenu: !this.state.dropdownMenu})
    }

    render() {
        if (!this.state.user) {
            return null;
        }

        return (
            <>
                <div id="kt_header" className="header header-fixed">
                    <div className="container-fluid d-flex align-items-stretch justify-content-between">
                        <div className="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <div id="kt_header_menu" className="header-menu header-menu-mobile header-menu-layout-default"></div>
                        </div>
                        <div className="topbar">
                            <div className="dropdown" id="kt_quick_search_toggle">
                                <div className="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <div className="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
											<span className="svg-icon svg-icon-xl svg-icon-primary">
                                                <img src="/media/svg/search.svg" alt=""/>
											</span>
                                    </div>
                                </div>
                                <div
                                    className="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                    <div className="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                                        <form method="get" className="quick-search-form">
                                            <div className="input-group">
                                                <div className="input-group-prepend">
														<span className="input-group-text">
															<span className="svg-icon svg-icon-lg">
                                                                <img src="/media/svg/search.svg" alt=""/>
															</span>
														</span>
                                                </div>
                                                <input type="text" className="form-control" placeholder="Search..."/>
                                                <div className="input-group-append">
														<span className="input-group-text">
															<i className="quick-search-close ki ki-close icon-sm text-muted"></i>
														</span>
                                                </div>
                                            </div>
                                        </form>
                                        <div className="quick-search-wrapper scroll" data-scroll="true"
                                             data-height="325"
                                             data-mobile-height="200"></div>
                                    </div>
                                </div>
                            </div>
                            <div className="dropdown">
                                <div className="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <div className="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
											<span className="svg-icon svg-icon-xl svg-icon-primary">
                                                <img src="/media/svg/notification.svg" alt=""/>
											</span>
                                    </div>
                                </div>
                                <div
                                    className="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                    <div
                                        className="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top"
                                    >
                                        <h4 className="text-white font-weight-bold">Quick Actions</h4>
                                        <span className="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>
                                    </div>
                                    <div className="row row-paddingless">
                                        <div className="col-6">
                                            <a href="#"
                                               className="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
													<span className="svg-icon svg-icon-3x svg-icon-success">

													</span>
                                                <span
                                                    className="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Accounting</span>
                                                <span className="d-block text-dark-50 font-size-lg">eCommerce</span>
                                            </a>
                                        </div>
                                        <div className="col-6">
                                            <a href="#"
                                               className="d-block py-10 px-5 text-center bg-hover-light border-bottom">
													<span className="svg-icon svg-icon-3x svg-icon-success">

													</span>
                                                <span
                                                    className="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Administration</span>
                                                <span className="d-block text-dark-50 font-size-lg">Console</span>
                                            </a>
                                        </div>
                                        <div className="col-6">
                                            <a href="#"
                                               className="d-block py-10 px-5 text-center bg-hover-light border-right">
													<span className="svg-icon svg-icon-3x svg-icon-success">

													</span>
                                                <span
                                                    className="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Projects</span>
                                                <span className="d-block text-dark-50 font-size-lg">Pending Tasks</span>
                                            </a>
                                        </div>
                                        <div className="col-6">
                                            <a href="#" className="d-block py-10 px-5 text-center bg-hover-light">
													<span className="svg-icon svg-icon-3x svg-icon-success">

													</span>
                                                <span
                                                    className="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Customers</span>
                                                <span className="d-block text-dark-50 font-size-lg">Latest cases</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="dropdown">
                                <div className="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <div className="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                        <img className="h-20px w-20px rounded-sm"
                                             src="/media/svg/flags/english.svg" alt=""/>
                                    </div>
                                </div>
                                <div
                                    className="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                    <ul className="navi navi-hover py-4">
                                        <li className="navi-item">
                                            <a href="#" className="navi-link">
													<span className="symbol symbol-20 mr-3">
														<img src="/media/svg/flags/english.svg" alt=""/>
													</span>
                                                <span className="navi-text">English</span>
                                            </a>
                                        </li>
                                        <li className="navi-item">
                                            <a href="#" className="navi-link">
													<span className="symbol symbol-20 mr-3">
														<img src="/media/svg/flags/russian.svg" alt=""/>
													</span>
                                                <span className="navi-text">Russian</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="topbar-item">
                                <div
                                    className="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                    id="kt_quick_user_toggle">
                                    <span
                                        className="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hello,</span>
                                    <span
                                        className="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                                        {this.state.user.name}
                                    </span>
                                    <span className="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span className="symbol-label font-size-h5 font-weight-bold">
                                            {this.state.user.name.substring(0, 1)}
                                        </span>
                                    </span>
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
        user: state.Auth.user
    }
};

export default connect(mapStateToProps)(Header);
