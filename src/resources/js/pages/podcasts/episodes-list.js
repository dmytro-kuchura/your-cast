import React from 'react';
import {getAllUserShows} from '../../services/show-service';
import {connect} from 'react-redux';

class EpisodesList extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            list: [],
            opened: null,
        };

        if (props.auth.isAuthenticated) {
            const userId = props.auth.user.id;
            props.dispatch(getAllUserShows(userId))
        }

        this.handleOpenDetails = this.handleOpenDetails.bind(this);
    }

    componentDidUpdate(prevProps) {
        if (prevProps.shows !== this.props.shows) {
            this.setState({
                list: this.props.shows.list
            })
        }
    }

    componentWillUnmount() {
        this.setState({
            show: {}
        })
    }

    handleOpenDetails(event) {
        let selected = event.currentTarget.id;

        this.setState({
            opened: selected === this.state.opened ? null : selected
        })
    }

    render() {
        return (
            <>
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <div className="card-body">
                                <div className="table-responsive">
                                    <table id="user-list" className="table table-lg">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input"
                                                           id="user-list-select-all"/>
                                                        <label className="custom-control-label"
                                                               htmlFor="user-list-select-all"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th className="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td>1</td>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                                        <span className="avatar-title rounded-pill">
                                                            <i className="ti-microphone"></i>
                                                        </span>
                                                    </figure>
                                                    Hillery Ovenell
                                                </a>
                                            </td>
                                            <td>hovenell0</td>
                                            <td>hovenell0@1und1.de</td>
                                            <td>Syria</td>
                                            <td>Staff</td>
                                            <td>
                                                <span className="badge bg-danger-bright text-danger">Blocked</span>
                                            </td>
                                            <td className="text-right">
                                                <div className="dropdown">
                                                    <a href="#" data-toggle="dropdown"
                                                       className="btn btn-floating"
                                                       aria-haspopup="true" aria-expanded="false">
                                                        <i className="ti-more-alt"></i>
                                                    </a>
                                                    <div className="dropdown-menu dropdown-menu-right">
                                                        <a href="#" className="dropdown-item">View Profile</a>
                                                        <a href="#" className="dropdown-item">Edit</a>
                                                        <a href="#" className="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>2</td>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                                        <span className="avatar-title rounded-pill">
                                                            <i className="ti-microphone"></i>
                                                        </span>
                                                    </figure>
                                                    Roarke Woolford
                                                </a>
                                            </td>
                                            <td>rwoolford1</td>
                                            <td>rwoolford1@nba.com</td>
                                            <td>Mauritania</td>
                                            <td>User</td>
                                            <td>
                                                <span className="badge bg-success-bright text-success">Active</span>
                                            </td>
                                            <td className="text-right">
                                                <div className="dropdown">
                                                    <a href="#" data-toggle="dropdown"
                                                       className="btn btn-floating"
                                                       aria-haspopup="true" aria-expanded="false">
                                                        <i className="ti-more-alt"></i>
                                                    </a>
                                                    <div className="dropdown-menu dropdown-menu-right">
                                                        <a href="#" className="dropdown-item">View Profile</a>
                                                        <a href="#" className="dropdown-item">Edit</a>
                                                        <a href="#" className="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>3</td>
                                            <td>
                                                <a href="#">
                                                    <figure className="avatar avatar-sm mr-2">
                                                        <span className="avatar-title rounded-pill">
                                                            <i className="ti-microphone"></i>
                                                        </span>
                                                    </figure>
                                                    Woody Guerra
                                                </a>
                                            </td>
                                            <td>wguerra2</td>
                                            <td>wguerra2@freewebs.com</td>
                                            <td>Poland</td>
                                            <td>Staff</td>
                                            <td>
                                                <span className="badge bg-danger-bright text-danger">Blocked</span>
                                            </td>
                                            <td className="text-right">
                                                <div className="dropdown">
                                                    <a href="#" data-toggle="dropdown"
                                                       className="btn btn-floating"
                                                       aria-haspopup="true" aria-expanded="false">
                                                        <i className="ti-more-alt"></i>
                                                    </a>
                                                    <div className="dropdown-menu dropdown-menu-right">
                                                        <a href="#" className="dropdown-item">View Profile</a>
                                                        <a href="#" className="dropdown-item">Edit</a>
                                                        <a href="#" className="dropdown-item text-danger">Delete</a>
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
        )
    }
}

const mapStateToProps = (state) => {
    return {
        auth: state.Auth,
        shows: state.ShowsList,
    }
};

export default connect(mapStateToProps)(EpisodesList)
