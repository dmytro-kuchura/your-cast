import React from 'react';

class StepSecond extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            show: {}
        };

        this.state.show = props.show;

        this.inputFileRef = React.createRef();
        this.handleButtonClick = this.handleButtonClick.bind(this);
    }

    componentDidUpdate(prevProps) {
        if (prevProps.show !== this.props.show) {
            this.setState({show: this.props.show})
        }
    }

    handleButtonClick(event) {
        event.preventDefault();

        this.inputFileRef.current.click();
    }

    render() {
        let image = this.state.show.artwork && this.state.show.artwork.length ? this.state.show.artwork : '/media/img/placeholder-image.png';

        return (
            <>
                <h4 className="create-form-title">Setup Your Show Artwork</h4>
                <div className="form-group row justify-content-md-center">
                    <div className="d-flex mb-3">
                        <figure className="mr-3">
                            <img className="rounded-pill" src={image} alt="artwork" width="100"/>
                        </figure>
                        <div>
                            <p>Artwork</p>
                            <input style={{display: 'none'}}
                                   type="file"
                                   accept=".png, .jpg, .jpeg"
                                   ref={this.inputFileRef}
                                   onChange={this.props.addArtwork}/>
                            <button className="btn btn-outline-light mr-2" onClick={this.handleButtonClick}>Change
                                Artwork
                            </button>
                            {/*<button className="btn btn-outline-danger">Remove Artwork</button>*/}
                            <p className="small text-muted mt-3">
                                We recommend using an image that is 3000px wide
                                <br/>and we will automatically crop it to a square.
                            </p>
                            <p className="small text-muted mt-3">
                                You can skip this for now if you want but it will be
                                required to publish.
                            </p>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

export default StepSecond;
