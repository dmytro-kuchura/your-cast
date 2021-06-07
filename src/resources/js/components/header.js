import React from 'react';
import {Link} from 'react-router-dom';
import {connect} from 'react-redux';
import {profile} from '../services/auth-service';

class Header extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            user: null,
            dropdownMenu: false,
            dropdownNotifications: false
        };

        this.handleDropdown = this.handleDropdown.bind(this);
        this.handleNotifications = this.handleNotifications.bind(this);
    }

    componentDidMount() {
        if (this.props.user) {
            this.setState({user: this.props.user})
        }

        this.props.dispatch(profile());
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

    handleNotifications(event) {
        event.preventDefault();

        this.setState({dropdownNotifications: !this.state.dropdownNotifications})
    }

    render() {
        if (!this.state.user) {
            return null;
        }

        return (
            <>
                <div className="header d-print-none">
                    <div className="header-container">
                        <div className="header-left">
                            <div className="navigation-toggler">
                                <a href="#" data-action="navigation-toggler">
                                    <i data-feather="menu"></i>
                                </a>
                            </div>

                            <div className="header-logo">
                                <Link to="/account/dashboard">
                                    <img className="logo" src="/media/img/podcasts-logo.png" alt="logo" width={100}/>
                                </Link>
                            </div>
                        </div>

                        <div className="header-body">
                            <div className="header-body-left"></div>
                            <div className="header-body-right">
                                <ul className="navbar-nav">
                                    <li className="nav-item dropdown">
                                        <a href="#" className="nav-link nav-link-notify" title="Notifications"
                                           onClick={this.handleNotifications}
                                           data-toggle="dropdown">
                                            <i className="fa fa-bell"/>
                                        </a>
                                        <div className={'dropdown-menu ' + (this.state.dropdownNotifications ? 'show' : '') + ' dropdown-menu-right dropdown-menu-big'}>
                                            <div
                                                className="border-bottom px-4 py-3 text-center d-flex justify-content-between align-items-center">
                                                <h5 className="mb-0">Notifications</h5>
                                                <small className="opacity-7">2 unread notifications</small>
                                            </div>
                                            <div className="dropdown-scroll">
                                                <ul className="list-group list-group-flush">
                                                    <li className="px-4 py-2 text-center small text-muted bg-light">Today</li>
                                                    <li className="px-4 py-3 list-group-item">
                                                        <a href="#"
                                                           className="d-flex align-items-center hide-show-toggler">
                                                            <div className="flex-shrink-0">
                                                                <figure className="avatar mr-3">
                                                        <span
                                                            className="avatar-title bg-info-bright text-info rounded-circle">
                                                            <i className="ti-lock"></i>
                                                        </span>
                                                                </figure>
                                                            </div>
                                                            <div className="flex-grow-1">
                                                                <p className="mb-0 line-height-20 d-flex justify-content-between">
                                                                    2 steps verification
                                                                    <i title="Mark as read" data-toggle="tooltip"
                                                                       className="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                                </p>
                                                                <span className="text-muted small">20 min ago</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li className="px-4 py-3 list-group-item">
                                                        <a href="#"
                                                           className="d-flex align-items-center hide-show-toggler">
                                                            <div className="flex-shrink-0">
                                                                <figure className="avatar mr-3">
                                                        <span
                                                            className="avatar-title bg-warning-bright text-warning rounded-circle">
                                                            <i className="ti-server"></i>
                                                        </span>
                                                                </figure>
                                                            </div>
                                                            <div className="flex-grow-1">
                                                                <p className="mb-0 line-height-20 d-flex justify-content-between">
                                                                    Storage is running low!
                                                                    <i title="Mark as read" data-toggle="tooltip"
                                                                       className="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                                </p>
                                                                <span className="text-muted small">45 sec ago</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li className="px-4 py-2 text-center small text-muted bg-light">Old
                                                        Notifications
                                                    </li>
                                                    <li className="px-4 py-3 list-group-item">
                                                        <a href="#"
                                                           className="d-flex align-items-center hide-show-toggler">
                                                            <div className="flex-shrink-0">
                                                                <figure className="avatar mr-3">
                                                        <span
                                                            className="avatar-title bg-secondary-bright text-secondary rounded-circle">
                                                            <i className="ti-file"></i>
                                                        </span>
                                                                </figure>
                                                            </div>
                                                            <div className="flex-grow-1">
                                                                <p className="mb-0 line-height-20 d-flex justify-content-between">
                                                                    1 person sent a file
                                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                                       className="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                                </p>
                                                                <span className="text-muted small">Yesterday</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li className="px-4 py-3 list-group-item">
                                                        <a href="#"
                                                           className="d-flex align-items-center hide-show-toggler">
                                                            <div className="flex-shrink-0">
                                                                <figure className="avatar mr-3">
                                                        <span
                                                            className="avatar-title bg-success-bright text-success rounded-circle">
                                                            <i className="ti-download"></i>
                                                        </span>
                                                                </figure>
                                                            </div>
                                                            <div className="flex-grow-1">
                                                                <p className="mb-0 line-height-20 d-flex justify-content-between">
                                                                    Reports ready to download
                                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                                       className="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                                </p>
                                                                <span className="text-muted small">Yesterday</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li className="px-4 py-3 list-group-item">
                                                        <a href="#"
                                                           className="d-flex align-items-center hide-show-toggler">
                                                            <div className="flex-shrink-0">
                                                                <figure className="avatar mr-3">
                                                        <span
                                                            className="avatar-title bg-primary-bright text-primary rounded-circle">
                                                            <i className="ti-arrow-top-right"></i>
                                                        </span>
                                                                </figure>
                                                            </div>
                                                            <div className="flex-grow-1">
                                                                <p className="mb-0 line-height-20 d-flex justify-content-between">
                                                                    The invitation has been sent.
                                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                                       className="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                                </p>
                                                                <span className="text-muted small">Last Week</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div className="px-4 py-3 text-right border-top">
                                                <ul className="list-inline small">
                                                    <li className="list-inline-item mb-0">
                                                        <a href="#">Mark All Read</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li className="nav-item dropdown">
                                        <a href="#" className="nav-link dropdown-toggle" title="User menu"
                                           onClick={this.handleDropdown}
                                           data-toggle="dropdown">
                                            <figure className="avatar avatar-sm">
                                                <img src="/media/img/placeholder-image.png"
                                                     className="rounded-circle"
                                                     alt="avatar"/>
                                            </figure>
                                            <span
                                                className="ml-2 d-sm-inline d-none">{this.state.user ? this.state.user.name : ''}</span>
                                        </a>
                                        <div
                                            className={'dropdown-menu ' + (this.state.dropdownMenu ? 'show' : '') + ' dropdown-menu-right dropdown-menu-big'}>
                                            <div className="text-center py-4">
                                                <figure className="avatar avatar-lg mb-3 border-0">
                                                    <img src="/media/img/placeholder-image.png"
                                                         className="rounded-circle" alt="image"/>
                                                </figure>
                                                <h5 className="text-center">{this.state.user ? this.state.user.name : ''}</h5>
                                                {/*<div className="mb-3 small text-center text-muted">@bonygidden</div>*/}
                                            </div>
                                            <div className="list-group">
                                                <Link to="/account/profile" className="list-group-item">Manage Your
                                                    Account</Link>
                                                <Link to="/account/logout"
                                                      className="list-group-item text-danger"
                                                      data-sidebar-target="#settings">Sign Out!</Link>
                                            </div>
                                            <div className="p-4">
                                                <div className="mb-4">
                                                    <h6 className="d-flex justify-content-between">
                                                        Storage
                                                        <span>%25</span>
                                                    </h6>
                                                    <div className="progress" style={{height: '5px'}}>
                                                        <div className="progress-bar bg-success-gradient"
                                                             role="progressbar" style={{width: '40%'}}
                                                             aria-valuenow="40" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <hr className="mb-3"/>
                                                <p className="small mb-0">
                                                    <a href="#">Privacy policy</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <ul className="navbar-nav ml-auto">
                            <li className="nav-item header-toggler">
                                <a href="#" className="nav-link">
                                    <i data-feather="arrow-down"></i>
                                </a>
                            </li>
                        </ul>
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
