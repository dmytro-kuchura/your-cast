import React from 'react';
import {connect} from 'react-redux';
import {Redirect} from 'react-router-dom';

class Dashboard extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            auth: null
        };
    }

    componentDidUpdate(prevProps) {
        if (prevProps !== this.props) {
            this.setState({
                auth: this.props.auth
            })
        }
    }

    render() {
        if (!this.state.auth) {
            return null;
        }

        if (!this.state.auth.isVerified) {
            return (
                <Redirect to={'/account/confirm-email'}/>
            )
        }

        if (!this.state.auth.hasShow) {
            return (
                <Redirect to={'/account/show/create'}/>
            )
        }

        return (
            <>
                <div className="row no-gutters app-block">
                    <div className="col-md-12 app-content">
                        {/*<div className="app-action">*/}
                        {/*    <div className="action-left">*/}
                        {/*        <ul className="list-inline">*/}
                        {/*            <li className="list-inline-item mb-0">*/}
                        {/*                <a href="#" className="btn btn-outline-light dropdown-toggle"*/}
                        {/*                   data-toggle="dropdown">*/}
                        {/*                    <i data-feather="plus" className="mr-1"></i>*/}
                        {/*                    Add*/}
                        {/*                </a>*/}
                        {/*                <div className="dropdown-menu">*/}
                        {/*                    <a className="dropdown-item" href="#">Folder</a>*/}
                        {/*                    <a className="dropdown-item" href="#">File</a>*/}
                        {/*                </div>*/}
                        {/*            </li>*/}
                        {/*            <li className="list-inline-item mb-0">*/}
                        {/*                <a href="#" className="btn btn-outline-light dropdown-toggle"*/}
                        {/*                   data-toggle="dropdown">*/}
                        {/*                    Order by*/}
                        {/*                </a>*/}
                        {/*                <div className="dropdown-menu">*/}
                        {/*                    <a className="dropdown-item" href="#">Date</a>*/}
                        {/*                    <a className="dropdown-item" href="#">Name</a>*/}
                        {/*                    <a className="dropdown-item" href="#">Size</a>*/}
                        {/*                </div>*/}
                        {/*            </li>*/}
                        {/*        </ul>*/}
                        {/*    </div>*/}
                        {/*</div>*/}

                        <h5 className="mb-4">Recent podcasts</h5>
                        <div className="card">
                            <div className="card-body">
                                <div className="table-responsive">
                                    <table className="table table-borderless table-hover mb-0">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Size</th>
                                            <th>Modified</th>
                                            <th>Pages</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                                        <span className="avatar-title rounded-pill">
                                                            <i className="ti-microphone"></i>
                                                        </span>
                                                    </figure>
                                                    Episode 05
                                                </a>
                                            </td>
                                            <td>2MB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-warning-bright text-warning">Project</div>
                                            </td>
                                            <td className="text-right">
                                                <div className="dropdown">
                                                    <a href="#" className="btn btn-floating btn-sm"
                                                       data-toggle="dropdown">
                                                        <i className="ti-more-alt"></i>
                                                    </a>
                                                    <div className="dropdown-menu dropdown-menu-right">
                                                        <a href="#" className="dropdown-item"
                                                           data-sidebar-target="#view-detail">View Details</a>
                                                        <a href="#" className="dropdown-item">Share</a>
                                                        <a href="#" className="dropdown-item">Download</a>
                                                        <a href="#" className="dropdown-item">Copy to</a>
                                                        <a href="#" className="dropdown-item">Move to</a>
                                                        <a href="#" className="dropdown-item">Rename</a>
                                                        <a href="#" className="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                                        <span className="avatar-title rounded-pill">
                                                            <i className="ti-microphone"></i>
                                                        </span>
                                                    </figure>
                                                    Episode 04
                                                </a>
                                            </td>
                                            <td>10MB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-secondary-bright text-secondary">Software</div>
                                            </td>
                                            <td className="text-right">
                                                <div className="dropdown">
                                                    <a href="#" className="btn btn-floating btn-sm"
                                                       data-toggle="dropdown">
                                                        <i className="ti-more-alt"></i>
                                                    </a>
                                                    <div className="dropdown-menu dropdown-menu-right">
                                                        <a href="#" className="dropdown-item"
                                                           data-sidebar-target="#view-detail">View Details</a>
                                                        <a href="#" className="dropdown-item">Share</a>
                                                        <a href="#" className="dropdown-item">Download</a>
                                                        <a href="#" className="dropdown-item">Copy to</a>
                                                        <a href="#" className="dropdown-item">Move to</a>
                                                        <a href="#" className="dropdown-item">Rename</a>
                                                        <a href="#" className="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                                        <span className="avatar-title rounded-pill">
                                                            <i className="ti-microphone"></i>
                                                        </span>
                                                    </figure>
                                                    Episode 03
                                                </a>
                                            </td>
                                            <td>139KB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-primary-bright text-primary">Public</div>
                                            </td>
                                            <td className="text-right">
                                                <div className="dropdown">
                                                    <a href="#" className="btn btn-floating btn-sm"
                                                       data-toggle="dropdown">
                                                        <i className="ti-more-alt"></i>
                                                    </a>
                                                    <div className="dropdown-menu dropdown-menu-right">
                                                        <a href="#" className="dropdown-item"
                                                           data-sidebar-target="#view-detail">View Details</a>
                                                        <a href="#" className="dropdown-item">Share</a>
                                                        <a href="#" className="dropdown-item">Download</a>
                                                        <a href="#" className="dropdown-item">Copy to</a>
                                                        <a href="#" className="dropdown-item">Move to</a>
                                                        <a href="#" className="dropdown-item">Rename</a>
                                                        <a href="#" className="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                                        <span className="avatar-title rounded-pill">
                                                            <i className="ti-microphone"></i>
                                                        </span>
                                                    </figure>
                                                    Episode 02
                                                </a>
                                            </td>
                                            <td>810KB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-success-bright text-success">Social Media</div>
                                            </td>
                                            <td className="text-right">
                                                <div className="dropdown">
                                                    <a href="#" className="btn btn-floating btn-sm"
                                                       data-toggle="dropdown">
                                                        <i className="ti-more-alt"></i>
                                                    </a>
                                                    <div className="dropdown-menu dropdown-menu-right">
                                                        <a href="#" className="dropdown-item"
                                                           data-sidebar-target="#view-detail">View Details</a>
                                                        <a href="#" className="dropdown-item">Share</a>
                                                        <a href="#" className="dropdown-item">Download</a>
                                                        <a href="#" className="dropdown-item">Copy to</a>
                                                        <a href="#" className="dropdown-item">Move to</a>
                                                        <a href="#" className="dropdown-item">Rename</a>
                                                        <a href="#" className="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                                        <span className="avatar-title rounded-pill">
                                                            <i className="ti-microphone"></i>
                                                        </span>
                                                    </figure>
                                                    Episode 01
                                                </a>
                                            </td>
                                            <td>10KB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-info-bright text-info">Design</div>
                                            </td>
                                            <td className="text-right">
                                                <div className="dropdown">
                                                    <a href="#" className="btn btn-floating btn-sm"
                                                       data-toggle="dropdown">
                                                        <i className="ti-more-alt"></i>
                                                    </a>
                                                    <div className="dropdown-menu dropdown-menu-right">
                                                        <a href="#" className="dropdown-item"
                                                           data-sidebar-target="#view-detail">View Details</a>
                                                        <a href="#" className="dropdown-item">Share</a>
                                                        <a href="#" className="dropdown-item">Download</a>
                                                        <a href="#" className="dropdown-item">Copy to</a>
                                                        <a href="#" className="dropdown-item">Move to</a>
                                                        <a href="#" className="dropdown-item">Rename</a>
                                                        <a href="#" className="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
};

export default connect(mapStateToProps)(Dashboard)
