import React from 'react';
import {getAllUserShows} from '../../services/show-service';
import {connect} from 'react-redux';

class EpisodesCreate extends React.Component {
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
                                <h6 className="card-title">Audio</h6>
                                <div className="row">
                                    <div className="col-md-8">
                                        <form>
                                            <div className="form-group">
                                                <label htmlFor="exampleInputEmail1">Email address</label>
                                                <input type="email" className="form-control" placeholder="Enter email"/>
                                            </div>
                                            <div className="form-group">
                                                <label htmlFor="exampleInputPassword1">Password</label>
                                                <input type="password" className="form-control"
                                                       id="exampleInputPassword1" placeholder="Password"/>
                                            </div>
                                            <div className="form-group form-check">
                                                <input type="checkbox" className="form-check-input" id="exampleCheck1"/>
                                                    <label className="form-check-label" htmlFor="exampleCheck1">Check me
                                                        out</label>
                                            </div>
                                            <button type="submit" className="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="card">
                            <div className="card-body">
                                <h6 className="card-title">General</h6>
                                <div className="row">
                                    <div className="col-md-8">
                                        <form>
                                            <div className="form-group">
                                                <label htmlFor="exampleInputEmail1">Email address</label>
                                                <input type="email" className="form-control" placeholder="Enter email"/>
                                            </div>
                                            <div className="form-group">
                                                <label htmlFor="exampleInputPassword1">Password</label>
                                                <input type="password" className="form-control"
                                                       id="exampleInputPassword1" placeholder="Password"/>
                                            </div>
                                            <div className="form-group form-check">
                                                <input type="checkbox" className="form-check-input" id="exampleCheck1"/>
                                                    <label className="form-check-label" htmlFor="exampleCheck1">Check me
                                                        out</label>
                                            </div>
                                            <button type="submit" className="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
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

export default connect(mapStateToProps)(EpisodesCreate)
