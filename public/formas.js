
    var $ = go.GraphObject.make;
    mydiagram=$(go.Diagram,"myDiagramdiv");
    var nodeDataArray=[
        { key :"Alpha",color:"lime"},
        { key :"Beta",color:"cyan"},
        {key :"Zeta",isGroup:true},
        {key :"Delta",color:"pink",group:"Zeta"},
        {key :"Gamma",color:"maroon",group:"Zeta"},
    ];

    var linkDataArray=[
        {to:"Beta",from:"Alpha",color:"red"},
        {from:"Alpha" ,to:"Zeta"},

    ];
    mydiagram.model=new go.GraphLinksModel(nodeDataArray, linkDataArray);

    mydiagram.nodeTemplate=
    $(go.Node,"Auto", $(go.Shape,"RoundedRectangle",{fill:"white"}, 
    new go.Binding("fill","color")
    ),
    $(go.TextBlock,"text",{margin:10}),
        new go.Binding("text","key")
    );
    mydiagram.linkTemplate =
    $(go.link,
        $(go.Shape,{strokeWidth:3},
            new go.Binding("stroke","color")
            ),
        $(go.Shape,{toArrow:"Standard",stroke:null},
           new go.Binding("fill","color"))
            )
