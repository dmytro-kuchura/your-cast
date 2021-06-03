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
                <h4 className="create-form-title">Format</h4>

                <div className="form-group">
                    <label>Choose format:</label>
                    <div className="row">
                        <div className="col-lg-6">
                            <label className="option">
                                    <span className="option-control">
                                        <span className="radio">
                                            <input type="radio"
                                                   value="episodic"
                                                   name="format"
                                                   checked={this.state.show.format === 'episodic'}
                                                   onChange={this.props.handleChangeInput}/>
                                            <span></span>
                                        </span>
                                    </span>
                                <span className="option-label">
                                        <span className="option-title">Episodic</span>
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
                                                   name="format"
                                                   checked={this.state.show.format === 'serial'}
                                                   onChange={this.props.handleChangeInput}/>
                                            <span></span>
                                        </span>
                                    </span>
                                <span className="option-label">
                                        <span className="option-title">Serial</span>
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
            </>
        );
    }
}

export default StepThird;
