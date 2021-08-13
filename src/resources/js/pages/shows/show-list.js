import React from 'react';
import {connect} from 'react-redux';
import {getAllUserShows} from '../../services/show-service';
import {Link} from 'react-router-dom';

class ShowList extends React.Component {
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
            opened: selected ===  this.state.opened ? null : selected
        })
    }

    render() {
        return (
            <>
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <div className="card-body">
                                <h6 className="card-title">All Shows</h6>
                                <div className="table-responsive">
                                    <table id="orders" className="table">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input"
                                                           id="orders-select-all"/>
                                                        <label className="custom-control-label"
                                                               htmlFor="orders-select-all"></label>
                                                </div>
                                            </th>
                                            <th>Show Name</th>
                                            <th>Total Podcasts</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th className="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <List list={this.state.list}
                                              opened={this.state.opened}
                                              handleOpenDetails={this.handleOpenDetails}/>

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

const List = (props) => {
    let list = props.list;
    let opened = parseInt(props.opened);
    let html;

    if (list.length > 0) {
        html = list.map(function (item) {
            return (
                <tr key={item.id}>
                    <td>
                        <input type="checkbox" className="custom-control-input"/>
                    </td>
                    <td>
                        <a href="product-detail.html" className="d-flex align-items-center">
                            <img width="40"
                                 src="/media/img/placeholder-image.png"
                                 className="rounded mr-3" alt="Shoe"/>
                            <span>{item.title}</span>
                        </a>
                    </td>
                    <td>1</td>
                    <td>
                        <span className="badge bg-secondary-bright text-secondary">{item.status}</span>
                    </td>
                    <td>2018/08/28 21:24:36</td>
                    <td className="text-right">
                        <div className="dropdown">
                            <a href="#" data-toggle="dropdown" id={item.id}
                               onClick={props.handleOpenDetails}
                               className="btn btn-floating">
                                <i className="ti-more-alt"></i>
                            </a>
                            <div className={item.id === opened ? 'dropdown-menu dropdown-menu-right show' : 'dropdown-menu dropdown-menu-right'}>
                                <Link to={'/account/show/' + item.token} className="dropdown-item">View</Link>
                                <a href="#" className="dropdown-item">Add podcast</a>
                                <a href="#" className="dropdown-item text-danger">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            )
        });

        return html;
    }

    return (
        <tr>
            <td colSpan="6">Nothing to show!</td>
        </tr>
    )
};

const mapStateToProps = (state) => {
    return {
        auth: state.Auth,
        shows: state.ShowsList,
    }
};

export default connect(mapStateToProps)(ShowList)
