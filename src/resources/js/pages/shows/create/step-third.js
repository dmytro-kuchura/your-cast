import React from 'react';

class StepThird extends React.Component {
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
        return (
            <>
                <div className="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                    <h4 className="mb-10 font-weight-bold text-dark">Format</h4>

                    <div className="form-group">
                        <label>Choose format:</label>
                        <div className="row">
                            <div className="col-lg-6">
                                <label className="option">
                                    <span className="option-control">
                                        <span className="radio">
                                            <input type="radio"
                                                   value="episodic"
                                                   name="type"
                                                   defaultChecked={true}
                                                   onChange={this.props.handleChangeInput}/>
                                            <span></span>
                                        </span>
                                    </span>
                                    <span className="option-label">
                                        <span className="option-head">
                                            <span className="option-title">Episodic</span>
                                        </span>
                                        <span className="option-body">
                                            This is the default format with episodes presented and recommended
                                            from newest-to-oldest.
                                            This option is recommended for stand-alone episodes.
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div className="col-lg-6">
                                <label className="option">
                                    <span className="option-control">
                                        <span className="radio">
                                            <input type="radio"
                                                   value="serial"
                                                   name="type"
                                                   onChange={this.props.handleChangeInput}/>
                                            <span></span>
                                        </span>
                                    </span>
                                    <span className="option-label">
                                        <span className="option-head">
                                            <span className="option-title">Serial</span>
                                        </span>
                                        <span className="option-body">
                                            For Shows with episodes presented and recommended oldest-to-newest
                                            and grouped by seasons.
                                            This option is recommended for narrative and storytelling formats.
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

export default StepThird;
