import React from 'react';

class StepSecond extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            show: {}
        };

        this.state.show = props.show;
    }

    componentDidUpdate(prevProps) {
        if (prevProps.show !== this.props.show) {
            this.setState({show: this.props.show})
        }
    }

    render() {
        let image = this.state.show.artwork && this.state.show.artwork.length ? this.state.show.artwork : '/media/img/placeholder-image.png';

        return (
            <>
                <div className="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                    <h4 className="mb-10 font-weight-bold text-dark">Setup Your Show Artwork</h4>
                    <div className="form-group row">
                        <label className="col-xl-3 col-lg-3 col-form-label text-right">Artwork</label>
                        <div className="col-lg-9 col-xl-6">
                            <div className="image-input" id="kt_image_2">
                                <div className="image-input-wrapper"
                                     style={{backgroundImage: 'url(' + image + ')'}}></div>
                                <label
                                    className="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title="Change artwork"
                                    data-original-title="Change artwork">
                                    <i className="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"
                                           onChange={this.props.addArtwork}/>
                                    <input type="hidden" name="artwork_remove"/>
                                </label>
                                <span
                                    className="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="cancel" data-toggle="tooltip" title=""
                                    data-original-title="Cancel artwork">
                                    <i className="fa fa-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <p className="form-text text-muted">We recommend using an image that is 3000px wide
                                <br/>and we will automatically crop it to a square.</p>
                            <p className="form-text text-muted">You can skip this for now if you want but it will be
                                required to publish.</p>
                        </div>
                    </div>

                </div>
            </>
        );
    }
}

export default StepSecond;
