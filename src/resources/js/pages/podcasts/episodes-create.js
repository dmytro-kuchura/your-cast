import React from 'react';
import {getAllUserShows} from '../../services/show-service';
import {connect} from 'react-redux';
import Dropzone from '../../utils/dropzone';

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
                                    <div className="col-md-12">
                                        <Dropzone title={'Episode audio file'}
                                                  type={'audio'}
                                                  description={'Click here to upload your audio file (max size 150 MB).'}
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="card">
                            <div className="card-body">
                                <h6 className="card-title">General</h6>
                                <div className="row">
                                    <div className="col-md-4">
                                        <div className="form-group">
                                            <label>Cover</label>
                                            <Dropzone title={'Episode cover'}
                                                      type={'cover'}
                                                      description={'Click here to upload your episode cover file (max size 15 MB).'}
                                            />
                                        </div>
                                    </div>
                                    <div className="col-md-8">
                                        <div className="form-group">
                                            <label htmlFor="title">Title</label>
                                            <input type="text" id="title" className="form-control" placeholder="Title"/>
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="subtitle">Subtitle</label>
                                            <input type="text" className="form-control" id="subtitle"
                                                   placeholder="Subtitle"/>
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="link">Link</label>
                                            <input type="text" className="form-control" id="link"
                                                   placeholder="Link"/>
                                        </div>
                                        <div className="row">
                                            <div className="col-md-6">
                                                <div className="form-group">
                                                    <label htmlFor="season">Season</label>
                                                    <input type="number" className="form-control" id="season"
                                                           placeholder="Episode Season"/>
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="form-group">
                                                    <label htmlFor="number">Episode #</label>
                                                    <input type="number" className="form-control" id="number"
                                                           placeholder="Episode #"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-12">
                                        <label htmlFor="alias">Episode Alias</label>
                                        <div className="input-group">
                                            <div className="input-group-prepend">
                                                    <span className="input-group-text" id="alias" style={{fontSize: '0.7rem'}}>
                                                        https://shows.your-cast.com/
                                                    </span>
                                            </div>
                                            <input type="text" className="form-control" placeholder="my-show" disabled=""/>

                                        </div>
                                    </div>
                                    <span className="help-block ml-3" style={{color: '#a1a1b2'}}>
                                            <small>
                                                <span>Choose wisely, this will be the public URL of your episode and you won't be able to change it ! It can only contain alphanumeric characters and dashes.</span>
                                            </small>
                                        </span>
                                </div>
                                <div className="row">
                                    <div className="col-md-8">
                                        <div className="form-group">
                                            <label htmlFor="summary">Summary</label>
                                            <textarea rows="6" id="summary" className="form-control" placeholder="Summary"/>
                                        </div>
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
