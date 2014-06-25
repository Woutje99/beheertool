<?php

class AdminIncidentsController extends AdminBaseController
{
	public function getIndex()
	{
		$this->layout->title				=	'Incidenten overzicht';
		$this->layout->content->title		= 	'Incidenten overzicht';
		$this->layout->content->content		=	View::make('admin.incidents.incidents_overview')
                                                                ->with('incidents', Incident::orderBy('id', 'DESC')->get());
	}

	 public function getEdit($id = null)
	 {
        $incident = null;
        if (!is_null($id))
        {
            $incident = Incident::find($id);

            $user_id = $incident->users_id;
            $incidents = Incident::where('users_id', $user_id)->orderBY('id', 'DESC')->get();

            $answerquestions = AnswerQuestion::where('incident_id', $id)->orderBy('question_id', 'DESC')->get();

            $this->layout->title = 'Incident \'' . $incident->id . '\' wijzigen';
            $this->layout->content->title = 'Incident \'' . $incident->id . '\' wijzigen';
        }

        $this->layout->content->content = View::make('admin.incidents.incidents_edit')
        										->with('incident', $incident)
                								->with('incidents', $incidents)
                								->with('answerquestions', $answerquestions);
    }

    public function edit($id = null)
    {
        $incident = null;
        if (!is_null($id))
        {
            $incident = Incident::find($id);

            $this->layout->title = 'Incident \'' . $incident->id . '\' wijzigen';
            $this->layout->content->title = 'Incident \'' . $incident->id . '\' wijzigen';
            $this->layout->content->content = View::make('admin.incidents.incidents_edit')->with('incident', $incident);
        }

            if($_POST['submit'])
            {
                if($_POST['status'])
                {
                    $status = Input::get('status');
                    $incident->status = $status;
                    $incident->save();

                    return Redirect::to('admin/incidents/edit/' . $incident->id)->with('success', 'Order status is gewijzigd');
                }

                else
                {
                    return Redirect::to('admin/incidents/edit/' . $incident->id)->with('warning', 'Order status is niet gewijzigd');
                }
            }
    }

    public function classifications($id = null)
    {
        $incident = null;
        if (!is_null($id))
        {
            $incident = Incident::find($id);

            $this->layout->title = 'Incident \'' . $incident->id . '\' wijzigen';
            $this->layout->content->title = 'Incident \'' . $incident->id . '\' wijzigen';
            $this->layout->content->content = View::make('admin.incidents.incidents_edit')->with('incident', $incident);
        }

        if($_POST['classification'])
        {
                $classification = Input::get('classification');
                $incident->classification = $classification;
                $incident->save();

                return Redirect::to('admin/incidents/edit/' . $incident->id)->with('success', 'Order classificatie is gewijzigd');
            }
             else
            {
                return Redirect::to('admin/incidents/edit/' . $incident->id)->with('warning', 'Order classificatie is niet gewijzigd');
            }
    }

    public function getMessages($id = null)
    {
        $incident = null;
        if (!is_null($id))
        {
            $incidentmessages = IncidentMessage::where('incident_id', '=', $id)->get();
            $this->layout->title = 'Berichten over incident \'' . $id . '\'';
            $this->layout->content->title = 'Berichten over incident \'' . $id . '\'';
            $this->layout->content->content = View::make('admin.incidents.incidents_messages')->with('incidentmessages', $incidentmessages);
        }
    }

    public function messages($id = null)
    {
        $incident = null;
        if (!is_null($id))
        {
            $incidentmessages = IncidentMessage::where('incident_id', '=', $id)->get();

            $this->layout->title = 'Berichten over incident \'' . $id . '\'';
            $this->layout->content->title = 'Berichten over incident \'' . $id . '\'';
            $this->layout->content->content = View::make('admin.incidents.incidents_messages')->with('incidentmessages', $incidentmessages);
        }

        if($_POST)
        {
            if($_POST['message'])
            {
                $incidentmessage = new IncidentMessage();
                $incidentmessage->message = Input::get('message');
                $incidentmessage->user_id = Auth::user()->id;
                $incidentmessage->incident_id = $id;
                $incidentmessage->save();

                return Redirect::to('admin/incidents/messages/' . $id)->with('success', 'Bericht is geplaatst');
            }
        }
    }

}