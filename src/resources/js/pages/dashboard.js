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

        if (!this.props.auth.hasShow) {
            return (
                <Redirect to={'/account/show/create'}/>
            )
        }

        return (
            <>
                <div className="row no-gutters app-block">
                    <div className="col-md-12 app-content">
                        <h3 className="mb-4">File Manager</h3>
                        <div className="app-action">
                            <div className="action-left">
                                <ul className="list-inline">
                                    <li className="list-inline-item mb-0">
                                        <a href="#" className="btn btn-outline-light dropdown-toggle"
                                           data-toggle="dropdown">
                                            <i data-feather="plus" className="mr-1"></i>
                                            Add
                                        </a>
                                        <div className="dropdown-menu">
                                            <a className="dropdown-item" href="#">Folder</a>
                                            <a className="dropdown-item" href="#">File</a>
                                        </div>
                                    </li>
                                    <li className="list-inline-item mb-0">
                                        <a href="#" className="btn btn-outline-light dropdown-toggle"
                                           data-toggle="dropdown">
                                            Order by
                                        </a>
                                        <div className="dropdown-menu">
                                            <a className="dropdown-item" href="#">Date</a>
                                            <a className="dropdown-item" href="#">Name</a>
                                            <a className="dropdown-item" href="#">Size</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

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
                                            <th>Label</th>
                                            <th>Members</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                            <span className="avatar-title bg-warning text-black-50 rounded-pill">
                                                <i className="ti-folder"></i>
                                            </span>
                                                    </figure>
                                                    User Research
                                                </a>
                                            </td>
                                            <td>2MB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-warning-bright text-warning">Project</div>
                                            </td>
                                            <td>
                                                <div className="avatar-group">
                                                    <figure className="avatar avatar-sm" title="Lisle Essam"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar2.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Baxie Roseblade"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/man_avatar5.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                </div>
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
                                <span className="avatar-title bg-warning text-black-50 rounded-pill">
                                    <i className="ti-folder"></i>
                                </span>
                                                    </figure>
                                                    Design Thinking Project
                                                </a>
                                            </td>
                                            <td>10MB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-secondary-bright text-secondary">Software</div>
                                            </td>
                                            <td>
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
                                    <i className="ti-file"></i>
                                </span>
                                                    </figure>
                                                    Meeting-notes.doc
                                                </a>
                                            </td>
                                            <td>139KB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-primary-bright text-primary">Public</div>
                                            </td>
                                            <td>
                                                <div className="avatar-group">
                                                    <figure className="avatar avatar-sm" title="Lisle Essam"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar2.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Baxie Roseblade"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/man_avatar5.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Mella Mixter"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar1.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Jo Hugill"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/man_avatar1.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Cullie Philcott"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar5.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="" data-toggle="tooltip"
                                                            data-original-title="Cullie Philcott">
                                                        <span
                                                            className="avatar-title bg-primary rounded-circle">+ 5</span>
                                                    </figure>
                                                </div>
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
                                    <i className="ti-image"></i>
                                </span>
                                                    </figure>
                                                    Sitemap.png
                                                </a>
                                            </td>
                                            <td>810KB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-success-bright text-success">Social Media</div>
                                            </td>
                                            <td>
                                                <div className="avatar-group">
                                                    <figure className="avatar avatar-sm" title="Lisle Essam"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar2.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Baxie Roseblade"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/man_avatar5.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Mella Mixter"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar1.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                </div>
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
                                    <i className="ti-file"></i>
                                </span>
                                                    </figure>
                                                    Analytics.pdf
                                                </a>
                                            </td>
                                            <td>10KB</td>
                                            <td>3/9/19, 2:40PM</td>
                                            <td>
                                                <div className="badge bg-info-bright text-info">Design</div>
                                            </td>
                                            <td>
                                                <div className="avatar-group">
                                                    <figure className="avatar avatar-sm" title="Lisle Essam"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar2.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Baxie Roseblade"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/man_avatar5.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Mella Mixter"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar1.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                    <figure className="avatar avatar-sm" title="Mella Mixter"
                                                            data-toggle="tooltip">
                                                        <img src="../../assets/media/image/user/women_avatar4.jpg"
                                                             className="rounded-circle"
                                                             alt="image"/>
                                                    </figure>
                                                </div>
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
    }
;

export default connect(mapStateToProps)(Dashboard)
