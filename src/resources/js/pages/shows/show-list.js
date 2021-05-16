import React from 'react';
import {connect} from 'react-redux';
import {getAllUserShows} from '../../services/show-service';

class ShowList extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            list: [],
        };

        if (props.auth.isAuthenticated) {
            const userId = props.auth.user.id;
            props.dispatch(getAllUserShows(userId))
        }
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

    render() {
        return (
            <>
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="card card-custom card-stretch gutter-b">
                                <div className="card-header border-0 pt-5">
                                    <h3 className="card-title align-items-start flex-column">
                                        <span className="card-label font-weight-bolder text-dark">New Arrivals</span>
                                        <span className="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                                    </h3>

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
                                                        <th className="p-0 min-w-200px"></th>
                                                        <th className="p-0 min-w-150px"></th>
                                                        <th className="p-0 min-w-110px"></th>
                                                        <th className="p-0 min-w-150px"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <List state={this.state.list}/>

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

const List = (props) => {
    let list = props.state;
    let html;

    if (list.length > 0) {
        html = list.map(function (item) {
            return (
                <tr key={item.id}>
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
                        <p className="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                            {item.title}
                        </p>
                        <div>
                            <span className="font-weight-bolder">Description: </span>
                            <span className="text-muted font-weight-bold text-hover-primary">
                                {item.description}
                            </span>
                        </div>
                    </td>
                    <td className="text-right">
                        <div>
                            <span className="font-weight-bolder">Timezone: </span>
                            <span className="text-muted font-weight-bold text-hover-primary">
                                {item.timezone}
                            </span>
                        </div>
                        <div>
                            <span className="font-weight-bolder">Language: </span>
                            <span className="text-muted font-weight-bold text-hover-primary">
                                {item.language}
                            </span>
                        </div>
                    </td>
                    <td className="text-right">
                        <span className="text-muted font-weight-500">{item.category}</span>
                    </td>
                    <td className="text-right">
                        <span className="label label-lg label-light-success label-inline">Success</span>
                    </td>
                    <td className="text-right pr-0">
                        <a href="#" className="btn btn-icon btn-light btn-hover-primary btn-sm">
                            <span className="svg-icon svg-icon-md svg-icon-primary"></span>
                        </a>
                        <a href="#" className="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                            <span className="svg-icon svg-icon-md svg-icon-primary"></span>
                        </a>
                        <a href="#" className="btn btn-icon btn-light btn-hover-primary btn-sm">
                            <span className="svg-icon svg-icon-md svg-icon-primary"></span>
                        </a>
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
